<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Calculator extends Component
{
    public string $num1 = '';
    public string $num2 = '';
    public string $action = '';
    public string $result = '';

    public bool $disabled = true;

    public function calculate(): void
    {
        $this->num1 = (float) $this->num1;
        $this->num2 = (float) $this->num2;
        switch ($this->action) {
            case '+':
                $this->result = $this->num1 + $this->num2;
                break;
            case '-':
                $this->result = $this->num1 - $this->num2;
                break;
            case '*':
                $this->result = $this->num1 * +$this->num2;
                break;
            case '/':
                $this->result = $this->num1 / $this->num2;
                break;
            case '%':
                $this->result = $this->num1 % $this->num2;
                break;
            default:
                $this->result = $this->num1 + $this->num2;
                break;
        }
    }
    public function render()
    {
        return view('livewire.calculator');
    }

    public function updated()
    {
        if (trim($this->num1) === '' || trim($this->num2) === '') {
            $this->disabled = true;
        } else {
            $this->disabled = false;
        }
    }
}
