<?php

/**
 * Clase que se utiliza para el manejo de sesiones
 */
class Session
{

  /**
   * inicia la sesion
   * @return void
   */
  public function iniciar()
  {
    session_start();
  }

  /**
   * agrega una nueva variable de sesion
   * @param  mixed $key
   * @param  mixed $value
   * @return void
   */
  public function add($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  /**
   * Trae la variable de sesion que se manda por parametro
   * @param  mixed $key
   * @return string retorna lo que hay en esa variable
   */
  public function get($key)
  {
    return !empty($_SESSION[$key]) ? $_SESSION[$key] : null;
  }

  /**
   * Trae todas las variables de sesion
   * @return string con los datos de las variables
   */
  public function getAll()
  {
    return $_SESSION;
  }

  /**
   * Elimina la varible deseada
   * @param  string $key
   * @return void
   */
  public function remove($key)
  {
    if (!empty($_SESSION[$key]))
      unset($_SESSION[$key]);
  }

  /**
   * Cierra y destruye todas las sesiones
   *
   * @return void
   */
  public function close()
  {
    session_unset();
    session_destroy();
  }


  /**
   * Muestra el estado de las varibles de sesion
   * @return string
   */
  public function getStatus()
  {
    return session_status();
  }
}
