# Pokémon Management System 🐾

Este proyecto es una aplicación web que permite a los usuarios gestionar Pokémon (crear, editar, eliminar y listar) en una base de datos. El acceso está restringido a usuarios autenticados.

## Características

- **Inicio de sesión**: Solo los usuarios registrados pueden acceder a las funcionalidades de la aplicación.
![image](https://github.com/user-attachments/assets/6c447598-af67-43eb-bf30-a6361cff3db6)
![image](https://github.com/user-attachments/assets/8520d861-6848-42bb-a49e-0cf9b8746319)
![image](https://github.com/user-attachments/assets/b5e38787-78bb-4d3f-9128-37ba4231f93c)
- **Gestión de Pokémon**: Permite crear, editar, eliminar y listar Pokémon desde la interfaz web.
![image](https://github.com/user-attachments/assets/3fc7201a-9497-42b0-9f49-f8039e7b13b6)
![image](https://github.com/user-attachments/assets/043bef4c-5508-477f-8088-8522abc86cc8)
![image](https://github.com/user-attachments/assets/e6061ade-4f31-400c-9e8a-0784a835971a)
![image](https://github.com/user-attachments/assets/f053d7e7-0266-466b-be4c-ae036d47dac1)
- **Base de datos**: Utiliza MySQL para almacenar la información de los Pokémon.
![image](https://github.com/user-attachments/assets/614193e0-68a2-4ef0-878b-51fa36423c73)
- **Sistema de validación**: Asegura que los datos ingresados son válidos antes de ser procesados.
![image](https://github.com/user-attachments/assets/5ed6d814-52c2-4073-8198-f01cf0388538)
---

## Requisitos

1. **Servidor web con PHP**
2. **Base de datos MySQL**
3. **Composer**
4. **Navegador web moderno**

---

## Instalación

1. **Clona el repositorio**:

    ```bash
    git clone https://github.com/tu-usuario/pokemon-management-system.git
    cd pokemon-management-system
    ```

2. **Configura la base de datos**:
   - Crea una base de datos llamada `pokemondatabase`.
   - Ejecuta el archivo SQL proporcionado (`database.sql`) para crear la tabla de Pokémon.

3. **Configura las credenciales**:
   - Edita las credenciales de la base de datos en el archivo `config.php` o en el archivo donde configures la conexión:
     ```php
     $connection = new \PDO(
         'mysql:host=localhost;dbname=pokemondatabase',
         'pokemonuser',
         'pokemonpassword'
     );
     ```

4. **Verifica los permisos**:
   - Asegúrate de que el servidor web tenga acceso de lectura/escritura a los directorios necesarios.

5. **Inicia el servidor**:
   Si estás usando el servidor embebido de PHP, puedes iniciarlo con:
   ```bash
   php -S localhost:8000

