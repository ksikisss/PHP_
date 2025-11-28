const videos = [
    'assets/videos/video1.mp4',
    'assets/videos/video3.mp4',
    'assets/videos/video2.mp4'
];

let currentIndex = 0;
const videoPlayer = document.getElementById('video-player');

// Функция смены видео
function changeVideo() {
    videoPlayer.src = videos[currentIndex];
    videoPlayer.play();
}

// Запуск первого видео
changeVideo();

// При завершении видео переключаемся на следующее
videoPlayer.addEventListener('ended', () => {
    currentIndex = (currentIndex + 1) % videos.length;
    changeVideo();
});

