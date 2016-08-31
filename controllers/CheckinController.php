<?php
require_once ROOT.'/models/UserModel.php';
require_once ROOT.'/vendor/autoload.php';

class CheckinController
{
    public $model;
    public function actionIndex()
    {
        require_once(ROOT.'/view/CheckinView.php');
    }

    public function actionReg()
    {
        $this->model = new UserModel();

        $username = trim(strip_tags($_POST['username']));
        $password = trim(strip_tags($_POST['password']));
        $name = trim(strip_tags($_POST['fullname']));
        $age = filter_var($_POST['age']);
        $about = trim(strip_tags($_POST['about']));
        $photoname = $_FILES['photo']['name'];
        $phototype = $_FILES['photo']['type'];
        $file = './photos/'.basename($photoname);

        $input = array(
            'username' => $username,
            'password' => $password,
            'name' => $name,
            'age' => $age,
            'about' => $about,
            'Img' => $photoname
        );

        if (empty($username) || empty($password) || empty($name) || empty($age) || empty($about) || empty($photoname))
        {
            echo 'Вы заполнили не все поля'."<a href='/checkin'>Попробуйте еще раз!</a>";
            exit;
        }

        if ($this->model->is_username_exist($username))
        {
            echo 'Пользователь с таким именем уже существует'."<a href='/checkin'>Попробуйте еще раз!</a>";
        }

        if (preg_match('/jpg|jpeg/', $photoname) or preg_match('/gif/', $photoname) or
            preg_match('/png/', $photoname))
        {
            if (preg_match('/jpg|jpeg/', $phototype) or preg_match('/gif/', $phototype) or
                preg_match('/png/', $phototype))
            {
                if ($this->model->addUser($input) && $this->model->addtoUserfiles($input))
                {
                    $mail = new PHPMailer();

                    $mail->isSMTP();
                    $mail->Host = 'smtp.yandex.ru';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'doe.senior';
                    $mail->Password = 'qwerty123456';
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port = 465;
//                    $mail->CharSet = 'UTF-8';

                    $mail->setFrom('doe.senior@yandex.ru', 'HomeWork6');
                    $mail->addAddress('ar.abelyan@yandex.ru');
                    $mail->isHTML(true);
                    $mail->Subject = 'Новый пользователь';
                    $mail->Body    = "Пользователь <b>$username</b> зарегистрирован!";
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


                    if(!$mail->send()) {
                        echo 'Message could not be sent.';
                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                    } else {
                        copy($_FILES['photo']['tmp_name'], $file);
                        session_start();
                        $_SESSION['login'] = $username;
                        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
                        header('Location:'.$host.'user');
                    }
                }
                else
                {
                    echo 'Что-то пошло не так';
                }
            }
            else
            {
                echo 'Неверный тип файла'."<a href='/checkin'>Попробуйте еще раз!</a>";
            }
        }
        else
        {
            echo 'Неверный тип файла'."<a href='/checkin'>Попробуйте еще раз!</a>";
        }


    }
}