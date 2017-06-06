<?php

class testSMS extends waSMSAdapter
{
    /**
     * @return array только зачем?
     */
    public function getControls()
    {
        return array(
            'login' => array(
                'title'       => 'Login',
                'description' => '',
            ),
            'password' => array(
                'title'       => 'Password',
                'description' => '',
            ),
        );
    }

    public function send($to, $text, $from = null)
    {
        waLog::dump(array(
            'to' => $to,
            'text' => $text,
            'from' => $from,
        ), 'testSms.log');

        $r = !preg_match('/(fail|error)/', $from);
        $this->log($to, $text, $r ? 'ok' : 'fail');
        return $r;
    }
}