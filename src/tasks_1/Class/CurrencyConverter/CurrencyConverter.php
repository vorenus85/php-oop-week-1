<?php

class Currency
{
    /**
     *
     * @var string
     */
    private string $name;

    /**
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}

class CurrencyConverter
{
    /**
     *
     * @var Currency[]
     */
    private array $currencies = [];

    /**
     *
     * @var array<mixed>
     */
    private array $convertionsRates = [];


    /**
     *
     * @param Currency $currency
     * @return void
     */
    public function addCurrency(Currency $currency): void
    {
        $this->currencies[] = $currency;
    }


    /**
     *
     * @param Currency $from
     * @param Currency $to
     * @param float $rate
     * @return void
     */
    public function addRate(Currency $from, Currency $to, float $rate): void
    {

        $this->checkCurrency($from);
        $this->checkCurrency($to);

        $this->convertionsRates[] = [
            'from' => $from->getName(),
            'to' => $to->getName(),
            'rate' => $rate
        ];
    }

    /**
     *
     * @param float $amount
     * @param Currency $from
     * @param Currency $to
     * @return float
     */
    public function convert(float $amount, Currency $from, Currency $to): float
    {
        $this->checkCurrency($from);
        $this->checkCurrency($to);
        $convertionsRates = $this->getConvertionsRates();

        $result = 0;

        foreach ($convertionsRates as $rate) {
            if ($rate['from'] === $from && $rate['to'] === $to) {
                $result = $rate['rate'] * $amount;
            }
        }

        if ($result === 0) {
            throw new Exception("Rate not found");
        }

        return $result;
    }


    /**
     *
     * @return array<Currency>
     */
    public function getCurreencies(): array
    {
        $result = [];

        foreach ($this->currencies as $currency) {
            $result[] = $currency;
        }

        return $result;
    }

    /**
     *
     * @return array<mixed>
     */
    public function getConvertionsRates(): array
    {
        $result = [];

        foreach ($this->convertionsRates as $convertionsRate) {
            $result[] = [
                'from' => $convertionsRate['from'],
                'to' => $convertionsRate['to'],
                'rate' => $convertionsRate['rate'],
            ];
        }

        return $result;
    }

    /**
     *
     * @param Currency $currency
     * @return void
     */
    private function checkCurrency(Currency $currency)
    {
        $currencies = $this->getCurreencies();

        if (!in_array($currency->getName(), $currencies, true)) {
            throw new InvalidArgumentException($currency->getName() . ' currency not found!');
        }
    }
}
