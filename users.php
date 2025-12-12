<?php

abstract class User {
    private string $name;
    private string $email;

    public function __construct(string $name, string $email) {
        $this->name = $name;
        $this->email = $email;
    }

    abstract public function getRole(): string;

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }
}
// ---
class Student extends User {
    private string $group;

    public function __construct(string $name, string $email, string $group) {
        parent::__construct($name, $email);
        $this->group = $group;
    }

    public function getRole(): string {
        return "Студент";
    }

    public function getGroup(): string {
        return $this->group;
    }

    public function setGroup(string $group): void {
        $this->group = $group;
    }
}
// ---
class Teacher extends User {
    private string $subject;

    public function __construct(string $name, string $email, string $subject) {
        parent::__construct($name, $email);
        $this->subject = $subject;
    }

    public function getRole(): string {
        return "Викладач";
    }

    public function getSubject(): string {
        return $this->subject;
    }

    public function setSubject(string $subject): void {
        $this->subject = $subject;
    }
}
// ---
$student = new Student("Ксенія Симоненко", "ksushasimonenko52@gmail.com", "КН-24");

$teacher = new Teacher("Костянтин Сурков", "kostiantynsurkov@gmail.com", "Програмування");

function displayUserInfo(User $user): void {
    echo "--------------------------" . PHP_EOL;
    echo "Ім'я: " . $user->getName() . PHP_EOL;
    echo "Email: " . $user->getEmail() . PHP_EOL;
    echo "Роль: " . $user->getRole() . PHP_EOL;

    if ($user instanceof Student) {
        echo "Група: " . $user->getGroup() . PHP_EOL;
    } elseif ($user instanceof Teacher) {
        echo "Предмет: " . $user->getSubject() . PHP_EOL;
    }
}

echo "Інформація про Студента" . PHP_EOL;
displayUserInfo($student);

echo "Інформація про Викладача" . PHP_EOL;
displayUserInfo($teacher);

$student->setGroup("КІ-24");
$teacher->setSubject("Фізика");

echo PHP_EOL . "--- Після оновлення ---" . PHP_EOL;
echo "Оновлена група студента: " . $student->getGroup() . PHP_EOL;
echo "Оновлений предмет викладача: " . $teacher->getSubject() . PHP_EOL;

?>