<?php
  class Session {
    private array $messages;

    public function __construct() {
      session_start();

      $this->messages = isset($_SESSION['messages']) ? $_SESSION['messages'] : array();
      if (!isset($_SESSION['csrf'])) {
        $_SESSION['csrf'] = $this->generate_random_token();
      }
      $this->clearMessages();
    }

    public function isLoggedIn() : bool {
      return isset($_SESSION['id']);    
    }

    public function logout() {
      session_destroy();
    }

    public function getId() : ?int {
      return isset($_SESSION['id']) ? $_SESSION['id'] : null;    
    }

    public function getName() : ?string {
      return isset($_SESSION['name']) ? $_SESSION['name'] : null;
    }

    public function setId(int $id) {
      $_SESSION['id'] = $id;
    }

    public function setName(string $name) {
      $_SESSION['name'] = $name;
    }

    public function addMessage(string $type, string $text) {
      $_SESSION['messages'][] = array('type' => $type, 'text' => $text);
    }

    public function clearMessages() {
      $_SESSION['messages'] = array();
    }

    public function getMessages() {
      return $this->messages;
    }

    public function getCSRF() {
      return $_SESSION['csrf'];
    }

    public function generate_random_token() {
      return bin2hex(openssl_random_pseudo_bytes(32));
    }
  }
?>