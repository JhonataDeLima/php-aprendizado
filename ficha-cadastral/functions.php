<?php

// calculo do salario anual
/**
 * Calcula o salario anual baseado no mensal
 * 
 * @param float $salarioMensal Salario mensal
 * 
 * @return float Salario Anual
 */
function calcular_salario_anual(float $salario_mensal):float
{
    //Salario anual = 12 Salarios, 13°, 1/3 Ferias
    $terco_ferias = $salario_mensal / 3;
    $salario_anual = ($salario_mensal *= 13) + $terco_ferias;

    return $salario_anual;
};

// quantos anos faltam para se aposentar

/**
 * Calcula quantos anos faltam para se aposentar
 * 
 * @param int $idade Idade
 * 
 * @param string $sexo Sexo
 * 
 * @param int Anos restantes para aposentar
 */
function calcular_tempo_restante_para_aposentadoria(int $idade, string $sexo):int
{
    // idade em que pode se aposentar, menos a idade do individuo
    $idade_para_aposentar = ($sexo == 'F') ? IDADE_APOSENTADORIA_FEMININA : IDADE_APOSENTADORIA_MASCULINA;
    $anos_restantes_para_aposentar = $idade_para_aposentar - $idade;
    return $anos_restantes_para_aposentar;
}

// transformar um numero em valor monetario
/**
 * Converte um numero para moeda brasileira
 * 
 * @param float $number numero a ser convertido
 * 
 * @return string valor formatado em real brasileiro
 */
function converter_numero_para_real(float $number):string
{
    return "R$".number_format($number, 2, ',', '.');
}