<?php
class Validate
{
    private $errors = [], $result = false; // errors -> array

    /*
     * $data -> which need check
     * $rules -> rules for data (allowed: required, max, min)
     */

    public function check($data, $rules)
    {
        foreach ($rules as $name_rule=>$rule){

            $value = $data[$name_rule];

            foreach($rule as $rule_key => $rule_value)


                if(!$value && $rule_key == 'required')
                    $this->errors[] = "{$name_rule} is required";
                else if ($value)

                    switch ($rule_key){
                        case 'max':
                            if (strlen ($value) > $rule_value){
                                $this->errors[] = "{$name_rule} must be maximum {$rule_value} simbols";
                            }
                            break;

                        case 'min':
                            if (strlen ($value) < $rule_value){
                                $this->errors[] = "{$name_rule} must be minimum {$rule_value} simbols";
                            }
                            break;

                    }


        }

        if(!$this->errors){
            $this->result = true;
            return false;
        } else {
            return true;
        }

    }
    /*
     * get Errors
     */
    public function getErrors()
    {
        return $this->errors;
    }
    /*
     * get Results
     */
    public function getResults()
    {
        return $this->result;
    }

}