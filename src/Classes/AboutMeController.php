<?php
/** 
 * Файл контролера AboutMeController
 *
 * Контролер для сторінки "Про мене". Відповідає за відображення
 * інформації про студента, університет та навички.
 *
 * @package     kn24_php
 * @subpackage  Controllers
 * @author      ksikisss
 * @version     1.2.0
 */
namespace Classes;
use Classes\Viewer;
/** 
 * Клас AboutMeController
 *
 * Обробляє логіку для сторінки "Про мене".
 * Передає дані про студента в шаблон через клас Viewer.
 */
class AboutMeController
{
    /** @var string Ім'я студента */
    private string $name = "Ksikisss";
    /** @var string Назва університету */
    private string $university = "ETI";
    /** @var string Назва групи */
    private string $group = "KN_24";
    /** @var array Список хобі / захоплень студента */
    private array $hobbi = [
        'Програмування',
        'Гра на гітарі',
        'Читання книг'
    ];
    /**
     * Метод show 
     *
     * Основний метод контролера, який викликається роутером.
     * Збирає дані про cтудента та передає їх у шаблон для рендерингу.
     *
     * @return void
     */
    public function show(): void
    {
        // Збираємо всі дані для передачі в шаблон
        $data = [
            'title'     => 'Про мене',
            'myName'    => $this->name,
            'myUni'     => $this->university,
            'myGroup'   => $this->group,
            'hobbi'     => $this->hobbi
        ];
        // Рендеримо шаблон через Viewer як в інших контролерах
        Viewer::show('aboutme', $data);
    }
    /**
     * Отримує ім'я студентв
     *
     * @return string Ім'я студента
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * Отримує назву університету
     *
     * @return string Назва університету
     */
    public function getUniversity(): string
    {
        return $this->university;
    }
    /**
     * Отримує назву групи
     *
     * @return string Назва групи
     */
    public function getGroup(): string
    {
        return $this->group;
    }
    /**
     * Отримує список хобі / захоплень
     *
     * @return array Масив хобі студента
     */
    public function getHobbi(): array
    {
        return $this->hobbi;
    }
}