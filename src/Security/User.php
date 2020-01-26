<?php

namespace App\Security;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    private $username;

    private $roles = [];

    /**
     * @var string The hashed password
     */
    private $password;

    private $fullname;

    private $email;

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
      // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
      // If you store any temporary, sensitive data on the user, clear it here
      // $this->plainPassword = null;
    }

    public function getFullname(): string
    {
      return (string) $this->fullname;
    }

    public function setFullname(string $fullname): self
    {
      $this->fullname = $fullname;

      return $this;
    }

    public function getEmail(): string
    {
      return (string) $this->email;
    }

    public function setEmail(string $email): self
    {
      $this->email = $email;

      return $this;
    }

}
