@extends('layouts.main')

@section('styles')
    <script src="https://unpkg.com/peerjs@1.0.0/dist/peerjs.min.js"></script>
@endsection

@section('content')

    <p>
    <h3>Мой ID: </h3><span id=myid></span></p>
    <input id=otherPeerId type=text placeholder="otherPeerId">
    <button onclick="callToNode(document.getElementById('otherPeerId').value)">Вызов</button>

    <br>
    <video id=myVideo muted="muted" width="400px" height="auto"></video>
    <div id=callinfo></div>
    <video id=remVideo width="400px" height="auto"></video>

@endsection
@section('footer')
    <script>
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

        peer = new Peer({config: callOptions});
        peer.on('open', function (peerID) {
            document.getElementById('myid').innerHTML = peerID;
        });
        let peercall;
        peer.on('call', function (call) {
            // Answer the call, providing our mediaStream
            peercall = call;
            document.getElementById('callinfo').innerHTML = "Входящий звонок <button onclick='callanswer()' >Принять</button><button onclick='callcancel()' >Отклонить</button>";
        });

        function callanswer() {
            navigator.mediaDevices.getUserMedia({audio: true, video: true}).then(function (mediaStream) {
                const video = document.getElementById('myVideo');
                peercall.answer(mediaStream); // отвечаем на звонок и передаем свой медиапоток собеседнику
                //peercall.on ('close', onCallClose); //можно обработать закрытие-обрыв звонка
                video.srcObject = mediaStream; //помещаем собственный медиапоток в объект видео (чтоб видеть себя)
                document.getElementById('callinfo').innerHTML = "Звонок начат... <button onclick='callclose()' >Завершить звонок</button>"; //информируем, что звонок начат, и выводим кнопку Завершить
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
                //  peercall.on('close', onCallClose);
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
