<?php

class Danestani
{
    private array $baseAPI = [
        'ok' => false,
        'status' => 400,
        'result' => [],
    ];

    public function __construct()
    {
        $data = json_decode(file_get_contents('danestani.json'), true);
        $this->baseAPI['ok'] = true;
        $this->baseAPI['status'] = 200;
        $this->baseAPI['result'] = $data[array_rand($data)];
    }

    public function __toString(): string
    {
        header("Content-Type: application/json");
        return json_encode($this->baseAPI);
    }
}
echo new Danestani;