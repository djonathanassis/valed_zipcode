<?php

namespace Source\Model;


use Source\Core\Model;

class ZipCode extends Model
{
    public function __construct()
    {
        parent::__construct('zipcode', ['id'], ['zipcode', 'cidade']);
    }

    public function bootstrap( string $zipcode, string $cidade): ZipCode
    {
        $this->zipcode = $zipcode;
        $this->cidade = $cidade;
        return $this;
    }

    public function findAll(string $columns = "*")
    {
        $find = $this->find('', $columns);
        return $find->fetch();
    }


    public function save(): bool
    {
        if (!$this->required()) {
            $this->message->warning("zipcode e cidade são obrigatórios");
            return false;
        }

        $zipcodeId = $this->create($this->safe());
        if ($this->fail()) {
            $this->message->error("Erro ao cadastrar, verifique os dados");
            return false;
        }

        $this->data = ($this->findById($zipcodeId))->data();
        return true;

    }
}