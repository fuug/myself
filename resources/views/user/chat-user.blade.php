@extends('layouts.main')
@section('title', 'Список клиентов')

@section('styles')
    <script src="https://kit.fontawesome.com/5cc1363b4b.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('sass/chat.css') }}">
@endsection

@section('footer')
    <script src="{{ asset('js/chat.js') }}"></script>
    <script src="https://unpkg.com/peerjs@1.0.0/dist/peerjs.min.js"></script>

    <script>
        $('#file').on('change', function () {
            var file_data = $('#file').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            $.ajax({
                url: '{{ route('file.upload') }}',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                data: form_data,
                type: 'post',
                success: function (data) {
                    const img = $('#image');
                    $('#file-input').hide();
                    img.html(`<img src="{{ url( 'storage/') }}/${data}">`);
                    img.show();
                    $('#file-path').val(data);
                },
                error: function (e) {
                    // console.log(e)
                },
            });
        });


        $('#call-btn').click(function () {
            checkPeerAndCall('{{ $second_user->id }}')
            $('.video').show();
        })

        const callOptions = {
            'iceServers': [{url: 'stun:stun01.sipphone.com'},
                {url: 'stun:stun.ekiga.net'},
                {url: 'stun:stun.fwdnet.net'},
                {url: 'stun:stun.ideasip.com'},
                {url: 'stun:stun.iptel.org'},
                {url: 'stun:stun.rixtelecom.se'},
                {url: 'stun:stun.schlund.de'},
                {url: 'stun:stun.l.google.com:19302'},
                {url: 'stun:stun1.l.google.com:19302'},
                {url: 'stun:stun2.l.google.com:19302'},
                {url: 'stun:stun3.l.google.com:19302'},
                {url: 'stun:stun4.l.google.com:19302'},
                {url: 'stun:stunserver.org'},
                {url: 'stun:stun.softjoys.com'},
                {url: 'stun:stun.voiparound.com'},
                {url: 'stun:stun.voipbuster.com'},
                {url: 'stun:stun.voipstunt.com'},
                {url: 'stun:stun.voxgratia.org'},
                {url: 'stun:stun.xten.com'},
                {
                    url: 'turn:numb.viagenie.ca',
                    credential: 'muazkh',
                    username: 'webrtc@live.com'
                },
                {
                    url: 'turn:192.158.29.39:3478?transport=udp',
                    credential: 'JZEOEt2V3Qb0y27GRntt2u2PAYA=',
                    username: '28224511:1379330808'
                },
                {
                    url: 'turn:192.158.29.39:3478?transport=tcp',
                    credential: 'JZEOEt2V3Qb0y27GRntt2u2PAYA=',
                    username: '28224511:1379330808'
                }]
        };

        let peer = null;
        peer = new Peer({config: callOptions});

        peer.on('open', function (peerID) {
            sendId(peerID);
            // document.getElementById('myid').innerHTML = peerID;
        });

        let peercall;
        peer.on('call', function (call) {
            peercall = call;
            // document.getElementById('callinfo').innerHTML = "Входящий звонок <button onclick='callanswer()'>Принять</button><button onclick='callcancel()' >Отклонить</button>";
            document.getElementById('message-container').insertAdjacentHTML('afterbegin', "<div class='writer'>Входящий звонок <span class='call-answer' onclick='callanswer()'>Принять</span> </div>")

        });

        function sendId(peerID) {
            $(function () {
                $.ajax({
                    url: '{{ route('user.profile.newPeerId', auth()->user()->id) }}',
                    type: "POST",
                    data: {peerId: peerID},
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            })
        }

        function checkPeerAndCall(userId) {
            $.ajax({
                url: "{{ route('user.profile.getPeerId') }}",
                type: "get",
                data: {userId: userId},
                dataType: "json",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    callToNode(data.peer_id)
                }
            })
        }

        function callanswer() {
            $('.video').show();
            navigator.mediaDevices.getUserMedia({audio: true, video: true}).then(function (mediaStream) {
                const video = document.getElementById('myVideo');
                peercall.answer(mediaStream); // отвечаем на звонок и передаем свой медиапоток собеседнику
                //peercall.on ('close', onCallClose); //можно обработать закрытие-обрыв звонка
                video.srcObject = mediaStream; //помещаем собственный медиапоток в объект видео (чтоб видеть себя)
                // document.getElementById('callinfo').innerHTML = "Звонок начат... <button onclick='callclose()' >Завершить звонок</button>"; //информируем, что звонок начат, и выводим кнопку Завершить
                video.onloadedmetadata = function (e) {//запускаем воспроизведение, когда объект загружен
                    video.play();
                };
                setTimeout(function () {
                    //входящий стрим помещаем в объект видео для отображения
                    document.getElementById('remVideo').srcObject = peercall.remoteStream;
                    document.getElementById('remVideo').onloadedmetadata = function (e) {
                        // и запускаем воспроизведение когда объект загружен
                        document.getElementById('remVideo').play();
                    };
                }, 1500);


            }).catch(function (err) {
                console.log(err.name + ": " + err.message);
            });
        }

        function callToNode(peerId) { //вызов
            navigator.mediaDevices.getUserMedia({audio: true, video: true}).then(function (mediaStream) {
                const video = document.getElementById('myVideo');
                peercall = peer.call(peerId, mediaStream);
                peercall.on('stream', function (stream) { //нам ответили, получим стрим
                    setTimeout(function () {
                        document.getElementById('remVideo').srcObject = peercall.remoteStream;
                        document.getElementById('remVideo').onloadedmetadata = function (e) {
                            document.getElementById('remVideo').play();
                        };
                    }, 1500);
                });
                // peer.on('close', function (call) {});
                video.srcObject = mediaStream;
                video.onloadedmetadata = function (e) {
                    video.play();
                };
            }).catch(function (err) {
                console.log(err.name + ": " + err.message);
            });
        }

    </script>
@endsection


@section('content')
    <div id="info" data-chat="{{ $chat->id }}" data-user="{{ $user->id }}"></div>
    <div class="video d-flex">
        <video id="remVideo"></video>
        <video id="myVideo" muted="muted"></video>
    </div>
    <div class="main">
        <div class="d-flex">
            <div class="sidebar">
                @foreach($users as $user_as_list)
                    <div class="d-flex item">
                        <div class="thumbnail">
                            <img src="{{ url( 'storage/' . $user_as_list->thumbnail) }}" alt="User photo">
                        </div>
                        <a href="{{ route('user.profile.chats.chat', [$user->id, $user_as_list->id]) }}">
                            <div>
                                <span>{{ $user_as_list->name }}</span>
                                <span>{{ $user_as_list->getChatWith($user->id)->getLastMessage()['created_at'] }}</span>
                            </div>
                            <div>{{ $user_as_list->getChatWith($user->id)->getLastMessage()['text']}}</div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="chat-container">
                <div class="chat-head">
                    <h3>{{ $second_user->name }}</h3> <span> <button id="call-btn">Начать видеочат</button> </span>
                </div>
                <div id="message-container">
                    @foreach($chat->messagesReverse as $message)
                        <div class="message message-{{ $message->user_id == $user->id ? 'writer' : 'reader' }}">
                            <div class="message-thumbnail">
                                <img src="{{ url( 'storage/' . $message->user->thumbnail) }}" alt="User photo">
                            </div>
                            <div class="{{ $message->user_id == $user->id ? 'writer' : 'reader' }} text">
                                <div>
                                    @if(isset($message->file))
                                        <img class="chat-thumb" src="{{ url( 'storage/' . $message->file) }}">
                                    @endif
                                    <p>
                                        {{ $message->text }}
                                    </p>
                                </div>
                                <span>{{ $user->convertTime($message->time()) }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <form name="publish" enctype="multipart/form-data">
                    <div class="chat-form">
                        <div id="file-input">
                            <input type="file" name="file" id="file">
                            <label for="file"><i class="fas fa-solid fa-paperclip"></i></label>
                        </div>
                        <div id="image"></div>
                        <div class="form-message">
                            <input type="hidden" id="file-path">
                            <input type="text" name="message" id="message"/>
                        </div>
                        <div class="form-submit">
                            {{--                        <input type="submit">--}}
                            <button type="submit">
                                <i class="fas fa-solid fa-play"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

