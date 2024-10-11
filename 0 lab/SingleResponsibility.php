<?php

class User {
    private $name;
    private $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }
}

class UserRepository {
    public function save(User $user) {
        echo "Saving user " . $user->getName() . " with email " . $user->getEmail() . "\n";
    }

    public function getByEmail($email) {
        return new User("John Doe", $email);
    }
}


$user = new User("Alice", "alice@gmail.com");
$userRepository = new UserRepository();
$userRepository->save($user);

