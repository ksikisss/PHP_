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

document.addEventListener("DOMContentLoaded", function() {
    setTimeout(addImages, 5000);
});

function addImages() {

    let imagesUrl = [
        "https://www.maybelline.ua/-/media/project/loreal/brand-sites/mny/emea/ua/products/eye-makeup/mascara/the-colossal-bubble-tush-dlia-obiemu-ta-rozdilennia-vii/mny_colossalbubble_pechkot.jpg?rev=d2f6d25d96af4c2b8cb521f27f8b1bed&cx=0.25&cy=0.31&cw=760&ch=1130&hash=2AC21A960858033A2D11D998CF89FCE6",
        "https://www.maybelline.ua/-/media/project/loreal/brand-sites/mny/emea/ua/products/face/bb-cream/dream-fresh-bb-cream/face-make-up_bb-cream_dream-fresh-bb_light-medium.jpg?rev=3701fa85fde24c81877bd79ca1a02f5b&cx=0.46&cy=0.5&cw=600&ch=900&hash=706316B21A791372060B4ED1BEE8BC68",
        "https://www.maybelline.ua/-/media/project/loreal/brand-sites/mny/emea/ua/products/eye-makeup/lash-sensational/lash-sensational/black/3600531143459.jpg?rev=f00e33ff77b84db39ff51047a01c2ee0&cx=0.5&cy=0.19&cw=315&ch=472&hash=75F717F3E5839495EF8DBE0468E047C4",
        "https://www.maybelline.ua/-/media/project/loreal/brand-sites/mny/emea/ua/products/face/blush-and-bronzer/fit-me-blush/maybelline-fitme-blush-55-berry-041554503722-c.jpg?rev=bcaf069a8e6c4e7ca86e85fb8fa8e5fa&cx=0&cy=0&cw=315&ch=472&hash=894A51688D2A1A6948B96BE20504F6FC"
    ];

    let parent = document.getElementById("image-gallery");

    if (!parent) {
        console.error("Батьківський елемент з ID 'image-gallery' не знайдено.");
        return;
    }

    imagesUrl.forEach((url, index) => {

        setTimeout(() => {
            let img = document.createElement("img");
            img.src = url;
            img.alt = "Maybelline Product " + (index + 1);
           
            img.classList.add("dynamic-image"); 

            parent.appendChild(img); 

            console.log(`Зображення ${index + 1} завантажено!`);
        }, index * 1000); // Затримка в 1 секунду між додаванням зображень
    });
}
