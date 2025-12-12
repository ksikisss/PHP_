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
