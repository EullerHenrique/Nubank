<?php
    class Tarefa{
        private $id;
        private $id_status;
        private $tarefa;

        public function __get($name){
            return $this->$name;
        }

        public function __set($name, $value){
            $this->$name = $value;
        }
    }
?>