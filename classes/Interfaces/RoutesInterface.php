<?php
namespace Framework\Interfaces;

interface RoutesInterface {
    public function getRoute(): array;
    public function getAuthentication(): \Framework\Authentication;
}
?>