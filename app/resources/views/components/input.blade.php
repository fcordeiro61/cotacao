namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $label;
    public $name;
    public $type;
    public $value;
    public $required;
    public $readonly;

    public function __construct($label, $name, $type = 'text', $value = '', $required = false, $readonly = false)
    {
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
        $this->required = $required;
        $this->readonly = $readonly;
    }

    public function render()
    {
        return view('components.input');
    }
}