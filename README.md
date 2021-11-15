# Robot Instructions Parser

parses Robot instructions and generates a file with final position for each instruction set. 
Robot initial position is `x=0, y=0 ` .
Each instruction character makes the robot move one step in certain direction:
 F => forward y + 1 
 B => forward y - 1
 R => forward x + 1 
 L => forward x - 1 

Example: FFRFL 

F => y + 1 => x=0 y=1
F => y + 1 => x=0 y=2 
R => x + 1 => x=1 y=2
F => y + 1 => x=1 y=3 
L => x - 1 => x=0 y=3 

Final position is x=0 y=3 File output FFRFL => x=0 y=3

# Code Structure :

 - Requests  : [App\Http\Requests\{OperationModuleRequest}] :
	 - Makes validation on http requests before injecting it into controllers actions .
	 - Inherited from 'Illuminate\Foundation\Http\FormRequest' .
	 - Example : Http\Requests\CreateElementRequest 
	 - References : 
		 - https://laravel.com/docs/8.x/validation#form-request-validation
		 - https://laravel.com/api/8.x/Illuminate/Foundation/Http/FormRequest.html .
 - Controllers : [App\Http\Controllers\{ModuleController}] :
	 - Makes Calling on Services By The Logical Sequance. 
	 - Inherited from 'App\Http\Controllers\Controller' .
	 - Can't do any logical operations on all logical operations are separated into 
		 service methods so it could just use service methods by logical sequence to achieve
		 task needs .
	 - Can't Call any class Except the Service class ... by the way Controllers can't call
		 each others just Call Its service only .
	 - Its constructor can't has iny injection on it, in the same time must inject its
	     service like that "__construct(ModuleService $service)";
	 - Each controller must declare protected property to carry its service instance on it
		  as these "protected $service" .
	 - Each method into Controller called 'action' .
	 - Action must be related to a 'route'.
 - Services : [App\Services\{ModuleService}] :
	 - Makes all logical functions on its method.
	 - Every single method into service called service.
	 - Every single method must implement just one operation .
	 - if task needs more than one operation controller will call each service and inject it
		 into the second one.
	 - Example :
		 - if task needs to sum to numbers then multiply the result with two it will be like
		  that :
		 -- into ServiceClass : 
			 public function sum(number1, number2){...}.
			 public function multiplyByTwo(number){...}.
		 -- into controller :
		    public function mathematicalOperation(MathematicalOperationRequest $request)
		    {
			   $sum_result = $this->service->sum($request->number1, $request->number2);
			   $multiply_result = $this->service->multiplyByTwo($sum_result);
		    }
	  - Service Can contact with another Services but not even any repository except his 
		  repository only.
		  
 - Templates: [App\Services\{ModuleTemplate}] :
	 - presents a single object and its main operation such like robot, board, ... etc .

# Main Classes Architecture:

 - Controllers : 
	 - RobotController :
		 - public  function  __construct(RobotService $service) : `__construct instantiate the controller`
		 - private parseFile (RobotTemplate $robot):void : `parseFile function parsing the instructions into files`
		 - public  function  parse(RobotParseRequest $request) : `parse function parsing the instructions`
- Services :
	- RobotService :
		- public  function  __construct(RobotTemplate $robot) : `__construct function instantiate service properties`
		- private  function  f():string : `f function returns forward string`
		- private  function  b():string : `b function returns backward string`
		- private  function  l():string : `l function returns left string`
		- private  function  r():string: `r function returns right string`
		- public  function  parse(string $instructions):RobotTemplate :`parse function parses the instructions of the robot`
- Templates :
	- RobotTemplate :
		- private integer $position_x = 0 : `$position_x presents the last robot position at X access`
		-	private integer  $position_y = 0 : `$position_y presents the last robot position at Y access`
		- private integer  $literal_instructions = [] : `literal_instructions variable has an array of instructions such as forward,backward, ...etc`
		- private integer  $characteristic_instructions = [] : `characteristic_instructions variable has an array of instructions such as f,l, ...etc`
		- private integer  $position_history = [] : `position_history variable has an array of position_history such as [1,2], [5,6], ...etc`
		- private  function  setHistory():void :`setHistory function inserts current location into position_history array`.
		- public  function  forward():void : `forward function increase the Y axis by one`.
		- public  function  backward():void : `forward function decrease the Y axis by one`.
		- public  function  right():void : `forward function increase the X axis by one` .
		- public  function  left():void`forward function decrease the X axis by one` .
		- public  function  getPosition():array:`getPosition function returns the current position of the robot`
		- public  function  getLiteralInstructions():array:`getLiteralInstructions function returns the literal instructions of the robot` .
		- public  function  getCharacteristicInstructions():array:`getCharacteristicInstructions function returns the characteristic instructions of the robot`.
		- public  function  getPositionHistory():array:`getPositionHistory function returns the position history of the robot`.
		- public  function  __get(string $var_name):?array : `__get function returns the current position only if the property is position, literal_history, char_history or history`.
		- public  function  __call(string $fun_name, $arguments = []):?array :`__call function returns the current position only if the method is position, literal_history, char_history or history`
			 
