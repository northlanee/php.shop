<?php

namespace north;

class Cache
{

    use TSingletone;

    public function set($key, $data, $seconds = 3600) {

        if ($seconds) {

            $content['data'] = $data;
            $content['endtime'] = time() + $seconds; // Время окончания кэша

            if(file_put_contents(TMP . '/' . md5($key) . '.txt', serialize($content))) {

                return true; // Если данные положены в кэш

            }

        }

        return false; // Если данные не были положены в кэш

    }

    public function get($key) {

        $file = TMP . '/' . md5($key) . '.txt'; // Формируем путь к файлу кэша

        if (file_exists($file)) {

            $content = unserialize(file_get_contents($file)); // Вытаскивание данных с кэша

            if (time() <= $content['endtime']) {

                return $content; // Если время файла не истекло, возврат данных

            }

            unlink($file); // Если время файла истекло, удалить файл

        }

        return false;

    }

    public function delete($key) {

        $file = TMP . '/' . md5($key) . '.txt'; // Формируем путь к файлу кэша

        if (file_exists($file)) {

            unlink($file); // Если файл существует, удалить файл

        }

    }

}