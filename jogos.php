<?php

class megaSena
{

    private $qtdDezenas;
    private $resultado;
    private $totalJogos;
    private $jogos;

    public function __construct($qtdDezenas, $totalJogos){
        $this->qtdDezenas = $qtdDezenas;
        $this->totalJogos = $totalJogos;
    }

    public function getQtdDezenas(){
        return $this->qtdDezenas;
    }

    public function setQtdDezenas($qtdDezenas){
        if($qtdDezenas<6 || $qtdDezenas>10){
            throw new Exception('Valor de dezena não permitido');
        }
        $this->qtdDezenas = $qtdDezenas;
    }

    public function getResultado(){
        return $this->resultado;
    }

    private function setResultado($resultado){
        $this->resultado = $resultado;
    }

    public function getTotalJogos(){
        return $this->totalJogos;
    }

    public function setTotalJogos($totalJogos){
        $this->totalJogos = $totalJogos;
    }

    public function getJogos(){
        return $this->jogos;
    }

    public function setJogos($jogos){
        $this->jogos = $jogos;
    }

    private function gerarJogo(int $qtd){
        $numeros = range(1,60);
        shuffle($numeros);
        $numeros = array_slice($numeros, 0, $qtd);
        sort($numeros);
        return $numeros;
    }   

    public function gerarCartela(){
        $totalJogos = $this->totalJogos;
        while($totalJogos>0){
            $jogos[] = $this->gerarJogo($this->qtdDezenas);
            $totalJogos--;
        }
        $this->jogos = $jogos;
    }

    public function sortearNumeros(){
        $sorteio = $this->gerarJogo(6);
        $this->resultado = $sorteio;
    }

    public function conferirJogo(array $jogo){
        $acertos = array_intersect($jogo, $this->resultado);
        return 'Acertou '.count($acertos);
    }


}