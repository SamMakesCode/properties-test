<?php

namespace App\DataTransferObjects;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Agent
{
    private string $name;
    private string $email;
    private string $phone;
    private string $address;

    public function __construct(
        string $name,
        string $email,
        string $phone,
        string $address
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
    }

    public static function fromRequest(Request $request): self
    {
        return new static(
            $request->get('name'),
            $request->get('email'),
            $request->get('phone'),
            $request->get('address'),
        );
    }

    public function getProperties(): array
    {
        $properties = [];

        foreach (get_object_vars($this) as $column => $value) {
            $column = Str::snake($column);
            $properties[$column] = $value;
        }

        return $properties;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getAddress(): string
    {
        return $this->address;
    }
}
