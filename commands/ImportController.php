<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Loan;
use app\models\Customer;
use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ImportController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";
    }

    public function actionImportUsers()
    {
        $users =  json_decode(file_get_contents(\Yii::getAlias('@app').'/users.json'));
        foreach ($users as $user)
        {
            $model = new Customer();
            $model->id = $user->id;
            $model->first_name = $user->first_name;
            $model->last_name = $user->last_name;
            $model->email = $user->email;
            $model->personal_code = $user->personal_code;
            $model->phone = $user->phone;
            $model->active = $user->active;
            $model->dead = $user->dead;
            $model->lang = $user->lang;
            $model->save();
            echo $user->first_name.' '.$user->last_name.' successfully added'."\n";
        }
    }

    public function actionImportLoans()
    {
        $loans_data =  json_decode(file_get_contents(\Yii::getAlias('@app').'/loans.json'));

        foreach ($loans_data as $loans)
        {
            $loan = new Loan();
            $loan->id           = $loans->id;
            $loan->user_id      = $loans->user_id;
            $loan->amount       = $loans->amount;
            $loan->interest     = $loans->interest;
            $loan->duration     = $loans->duration;
            $loan->start_date   = date('Y-m-d', $loans->start_date);
            $loan->end_date     = date('Y-m-d', $loans->end_date);
            $loan->campaign     = $loans->campaign;
            $loan->status       = $loans->status;
            $loan->save();
            echo $loans->user_id.' successfully added'."\n";
        }
    }
}
