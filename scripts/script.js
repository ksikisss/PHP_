const videos = [
    'assets/videos/video1.mp4',
    'assets/videos/video3.mp4',
    'assets/videos/video2.mp4'
];

let currentIndex = 0;
let videoPlayer = null;

// Функция смены видео
function changeVideo() {
    if (!videoPlayer) return;
    
    try {
        videoPlayer.src = videos[currentIndex];
        videoPlayer.play().catch(error => {
            console.log('Помилка відтворення відео:', error);
        });
    } catch (error) {
        console.log('Помилка завантаження відео:', error);
    }
}

// Ініціалізація відео після завантаження DOM
document.addEventListener('DOMContentLoaded', () => {
    videoPlayer = document.getElementById('video-player');
    
    if (videoPlayer) {
        // Обробка помилок завантаження відео
        videoPlayer.addEventListener('error', (e) => {
            console.log('Помилка завантаження відео файлу:', videos[currentIndex]);
            // Переходимо до наступного відео при помилці
            currentIndex = (currentIndex + 1) % videos.length;
            if (currentIndex !== 0) {
                changeVideo();
            }
        });
        
        // Запуск первого видео
        changeVideo();
        
        // При завершении видео переключаемся на следующее
        videoPlayer.addEventListener('ended', () => {
            currentIndex = (currentIndex + 1) % videos.length;
            changeVideo();
        });
    }
});


    // Валідація форми авторизації 
    const loginForm = document.getElementById('login-form');

    if (loginForm) {
        loginForm.addEventListener('submit', (event) => {
            event.preventDefault();

            const loginInput = document.getElementById('login');
            const emailInput = document.getElementById('email');
            const phoneInput = document.getElementById('phone');
            
            const rawLogin = loginInput.value.trim();

            const login = rawLogin.replace(/[^A-Za-z0-9]/g, '');

            loginInput.value = login;
            const email = emailInput.value.trim();
            const phone = phoneInput.value.trim();

            const errors = [];

            // Перевірка логіну через RegExp + match
            const loginPattern = /^[A-Za-z0-9]{3,16}$/;
            if (!login.match(loginPattern)) {
                errors.push('Логін має містити 3–16 латинських літер або цифр без пробілів.');
            }

            // Перевірка email через RegExp + search
            const emailPattern = /^[\w.-]+@[\w.-]+\.\w{2,}$/;
            if (email.search(emailPattern) === -1) {
                errors.push('Введіть коректну електронну пошту (формат типу user@example.com).');
            }

            // Перевірка телефону через RegExp + match
            const phonePattern = /^\+?\d{9,13}$/;
            if (!phone.match(phonePattern)) {
                errors.push('Телефон має містити від 9 до 13 цифр, допускається знак "+" на початку.');
            }

            if (errors.length > 0) {
                alert(errors.join('\n'));
            } else {
                alert('Дані введені коректно!');

            }
        });
    };

        // Додаємо зображення у секцію бестселерів через 5 секунд після завантаження сторінки
        function addImages() {
            const imagesUrl = [
                "https://www.maybelline.ua/-/media/project/loreal/brand-sites/mny/emea/ua/products/eye-makeup/mascara/the-colossal-bubble-tush-dlia-obiemu-ta-rozdilennia-vii/mny_colossalbubble_pechkot.jpg?rev=d2f6d25d96af4c2b8cb521f27f8b1bed&cx=0.25&cy=0.31&cw=760&ch=1130&hash=2AC21A960858033A2D11D998CF89FCE6",
                "https://www.maybelline.ua/-/media/project/loreal/brand-sites/mny/emea/ua/products/face/bb-cream/dream-fresh-bb-cream/face-make-up_bb-cream_dream-fresh-bb_light-medium.jpg?rev=3701fa85fde24c81877bd79ca1a02f5b&cx=0.46&cy=0.5&cw=600&ch=900&hash=706316B21A791372060B4ED1BEE8BC68",
                "https://www.maybelline.ua/-/media/project/loreal/brand-sites/mny/emea/ua/products/eye-makeup/lash-sensational/lash-sensational/black/3600531143459.jpg?rev=f00e33ff77b84db39ff51047a01c2ee0&cx=0.5&cy=0.19&cw=315&ch=472&hash=75F717F3E5839495EF8DBE0468E047C4",
                "https://www.maybelline.ua/-/media/project/loreal/brand-sites/mny/emea/ua/products/face/blush-and-bronzer/fit-me-blush/maybelline-fitme-blush-55-berry-041554503722-c.jpg?rev=bcaf069a8e6c4e7ca86e85fb8fa8e5fa&cx=0&cy=0&cw=315&ch=472&hash=894A51688D2A1A6948B96BE20504F6FC"
            ];

            const parent = document.querySelector('.products-bet');
            if (!parent) return;

            imagesUrl.forEach((url, index) => {
                setTimeout(() => {
                    const fragment = document.createDocumentFragment();

                    const article = document.createElement('article');
                    article.className = 'products-bet-card';

                    const a = document.createElement('a');
                    const figure = document.createElement('figure');

                    const img = document.createElement('img');
                    img.src = url;
                    img.alt = `Бестселер ${index + 1}`;

                    const figcaption = document.createElement('figcaption');
                    figcaption.className = 'products-bet-overlay';
                    figcaption.textContent = `Новий бестселер ${index + 1}`;

                    figure.appendChild(img);
                    figure.appendChild(figcaption);
                    a.appendChild(figure);
                    article.appendChild(a);

                    fragment.appendChild(article);
                    parent.appendChild(fragment);
                }, index * 1000);
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            // Викликаємо addImages через 5 секунд після завантаження DOM
            setTimeout(addImages, 5000);
        });
