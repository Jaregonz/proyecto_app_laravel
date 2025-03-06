<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Comments;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Crear usuarios con datos específicos
        $users = User::insert([
            [
                'name' => 'Juan Pérez',
                'email' => 'juan@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('Password123'),
                'banned' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ana Gómez',
                'email' => 'ana@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('Password123'),
                'banned' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carlos López',
                'email' => 'carlos@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('Password123'),
                'banned' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'María Rodríguez',
                'email' => 'maria@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('Password123'),
                'banned' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Luis Fernández',
                'email' => 'luis@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('Password123'),
                'banned' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Crear posts
        $posts = [
            ['title' => 'Post 1', 'description' => 'Descripción del primer post', 'publish_date' => Carbon::create('2025', '02', '25', '10', '00', '00'),'foto'=>'posts-images/1.jpg' ,'n_likes' => 5, 'belongs_to' => 1],
            ['title' => 'Post 2', 'description' => 'Descripción del segundo post', 'publish_date' => Carbon::create('2025', '02', '26', '11', '00', '00'), 'foto'=>'posts-images/2.jpg','n_likes' => 8, 'belongs_to' => 2],
            ['title' => 'Post 3', 'description' => 'Descripción del tercer post', 'publish_date' => Carbon::create('2025', '02', '27', '12', '00', '00'), 'foto'=>'posts-images/3.jpg', 'n_likes' => 12, 'belongs_to' => 3],
            ['title' => 'Post 4', 'description' => 'Descripción del cuarto post', 'publish_date' => Carbon::create('2025', '02', '28', '13', '00', '00'),'foto'=>'posts-images/4.jpg', 'n_likes' => 15, 'belongs_to' => 4],
            ['title' => 'Post 5', 'description' => 'Descripción del quinto post', 'publish_date' => Carbon::create('2025', '03', '01', '14', '00', '00'), 'foto'=>'posts-images/5.jpg', 'n_likes' => 20, 'belongs_to' => 5],
            ['title' => 'Post 6', 'description' => 'Descripción del sexto post', 'publish_date' => Carbon::create('2025', '03', '02', '15', '00', '00'), 'foto'=>'posts-images/6.jpg', 'n_likes' => 25, 'belongs_to' => 1],
            ['title' => 'Post 7', 'description' => 'Descripción del séptimo post', 'publish_date' => Carbon::create('2025', '03', '03', '16', '00', '00'), 'foto'=>'posts-images/7.jpg', 'n_likes' => 30, 'belongs_to' => 2],
            ['title' => 'Post 8', 'description' => 'Descripción del octavo post', 'publish_date' => Carbon::create('2025', '03', '04', '17', '00', '00'), 'foto'=>'posts-images/8.png', 'n_likes' => 35, 'belongs_to' => 3],
            ['title' => 'Post 9', 'description' => 'Descripción del noveno post', 'publish_date' => Carbon::create('2025', '03', '05', '18', '00', '00'), 'foto'=>'posts-images/9.jpg', 'n_likes' => 40, 'belongs_to' => 4],
            ['title' => 'Post 10', 'description' => 'Descripción del décimo post', 'publish_date' => Carbon::create('2025', '03', '06', '19', '00', '00'), 'foto'=>'posts-images/10.jpg',  'n_likes' => 45, 'belongs_to' => 5],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }

        $comments = [
            // Comentarios para el primer post
            ['comment' => '¡Este post es increíble! Me encantó lo que compartiste, sigue así.', 'publish_date' => Carbon::create('2025', '02', '25', '10', '15', '00'), 'user_id' => 2, 'post_id' => 1],
            ['comment' => 'Muy buen contenido, me dio algunas ideas que pondré en práctica. Gracias por compartir.', 'publish_date' => Carbon::create('2025', '02', '25', '10', '30', '00'), 'user_id' => 3, 'post_id' => 1],
            ['comment' => '¡Genial! La verdad es que me hizo reflexionar bastante. Espero más posts como este.', 'publish_date' => Carbon::create('2025', '02', '25', '10', '45', '00'), 'user_id' => 4, 'post_id' => 1],
        
            // Comentarios para el segundo post
            ['comment' => '¡Me encanta cómo expresas tus ideas! Todo está muy bien explicado.', 'publish_date' => Carbon::create('2025', '02', '26', '11', '15', '00'), 'user_id' => 1, 'post_id' => 2],
            ['comment' => 'Gran aporte, realmente me ayudaste a entender un tema complicado.', 'publish_date' => Carbon::create('2025', '02', '26', '11', '30', '00'), 'user_id' => 5, 'post_id' => 2],
            ['comment' => 'Muy bueno. Estoy de acuerdo con muchos puntos que mencionas. Espero más posts como este.', 'publish_date' => Carbon::create('2025', '02', '26', '11', '45', '00'), 'user_id' => 3, 'post_id' => 2],
        
            // Comentarios para el tercer post
            ['comment' => '¡Qué gran información! Es justo lo que necesitaba. ¡Gracias por compartirlo!', 'publish_date' => Carbon::create('2025', '02', '27', '12', '15', '00'), 'user_id' => 2, 'post_id' => 3],
            ['comment' => 'Tu perspectiva sobre el tema es muy interesante, me dio nuevas ideas para aplicar.', 'publish_date' => Carbon::create('2025', '02', '27', '12', '30', '00'), 'user_id' => 4, 'post_id' => 3],
            ['comment' => '¡Este post es muy útil! He aprendido mucho hoy, gracias.', 'publish_date' => Carbon::create('2025', '02', '27', '12', '45', '00'), 'user_id' => 5, 'post_id' => 3],
        
            // Comentarios para el cuarto post
            ['comment' => 'Interesante enfoque, lo voy a investigar más a fondo. ¡Gracias por la recomendación!', 'publish_date' => Carbon::create('2025', '02', '28', '13', '15', '00'), 'user_id' => 1, 'post_id' => 4],
            ['comment' => 'Este tema me interesa mucho, voy a leer más sobre ello. ¡Gran post!', 'publish_date' => Carbon::create('2025', '02', '28', '13', '30', '00'), 'user_id' => 3, 'post_id' => 4],
            ['comment' => '¡Muy buen artículo! Me has dado un par de ideas para implementar en mi trabajo.', 'publish_date' => Carbon::create('2025', '02', '28', '13', '45', '00'), 'user_id' => 5, 'post_id' => 4],
        
            // Comentarios para el quinto post
            ['comment' => 'Gracias por compartir esta información. Estoy seguro de que será útil en el futuro.', 'publish_date' => Carbon::create('2025', '03', '01', '14', '15', '00'), 'user_id' => 2, 'post_id' => 5],
            ['comment' => 'Lo que mencionas sobre el tema es realmente innovador. Voy a probar algunas de tus ideas.', 'publish_date' => Carbon::create('2025', '03', '01', '14', '30', '00'), 'user_id' => 4, 'post_id' => 5],
            ['comment' => 'Me encantó el enfoque que le diste al post. Definitivamente más posts como este, por favor.', 'publish_date' => Carbon::create('2025', '03', '01', '14', '45', '00'), 'user_id' => 3, 'post_id' => 5],
        
            // Comentarios para el sexto post
            ['comment' => 'Este post es impresionante. Voy a investigar más sobre el tema. ¡Gracias!', 'publish_date' => Carbon::create('2025', '03', '02', '15', '15', '00'), 'user_id' => 5, 'post_id' => 6],
            ['comment' => '¡Qué buen artículo! Es algo que muchos deberían leer.', 'publish_date' => Carbon::create('2025', '03', '02', '15', '30', '00'), 'user_id' => 2, 'post_id' => 6],
            ['comment' => '¡Me encanta cómo explicas todo! Todo está muy claro y bien estructurado.', 'publish_date' => Carbon::create('2025', '03', '02', '15', '45', '00'), 'user_id' => 3, 'post_id' => 6],
        
            // Comentarios para el séptimo post
            ['comment' => 'Me ha servido mucho este post, ¡gracias por compartir! Estoy aprendiendo bastante.', 'publish_date' => Carbon::create('2025', '03', '03', '16', '15', '00'), 'user_id' => 4, 'post_id' => 7],
            ['comment' => '¡Sigue compartiendo este tipo de contenido! Me encanta lo que estás haciendo.', 'publish_date' => Carbon::create('2025', '03', '03', '16', '30', '00'), 'user_id' => 1, 'post_id' => 7],
            ['comment' => '¡Excelente aporte! Me hizo pensar en varias cosas que nunca había considerado antes.', 'publish_date' => Carbon::create('2025', '03', '03', '16', '45', '00'), 'user_id' => 5, 'post_id' => 7],
        
            // Comentarios para el octavo post
            ['comment' => '¡Muy interesante! No había visto este enfoque antes. Voy a probar algunas de tus sugerencias.', 'publish_date' => Carbon::create('2025', '03', '04', '17', '15', '00'), 'user_id' => 2, 'post_id' => 8],
            ['comment' => 'Este tipo de contenido es lo que necesitamos. Sigue adelante con esta línea de posts.', 'publish_date' => Carbon::create('2025', '03', '04', '17', '30', '00'), 'user_id' => 3, 'post_id' => 8],
            ['comment' => '¡Me encantó! La información es clara y fácil de entender. Gracias por compartir.', 'publish_date' => Carbon::create('2025', '03', '04', '17', '45', '00'), 'user_id' => 4, 'post_id' => 8],
        
            // Comentarios para el noveno post
            ['comment' => 'Muy buen post, me dio un par de ideas que ya estoy implementando. ¡Gracias!', 'publish_date' => Carbon::create('2025', '03', '05', '18', '15', '00'), 'user_id' => 1, 'post_id' => 9],
            ['comment' => 'Excelente artículo, me ha ayudado a entender el tema mucho mejor. ¡Sigue así!', 'publish_date' => Carbon::create('2025', '03', '05', '18', '30', '00'), 'user_id' => 5, 'post_id' => 9],
            ['comment' => 'Es impresionante lo bien que abordas estos temas. Me has dado muchas ideas. ¡Gracias!', 'publish_date' => Carbon::create('2025', '03', '05', '18', '45', '00'), 'user_id' => 2, 'post_id' => 9],
        
            // Comentarios para el décimo post
            ['comment' => '¡Esto es oro puro! Definitivamente voy a compartirlo con mis amigos.', 'publish_date' => Carbon::create('2025', '03', '06', '19', '15', '00'), 'user_id' => 3, 'post_id' => 10],
            ['comment' => 'Este post es increíble, sigue compartiendo contenido de este tipo. ¡Es justo lo que necesitaba!', 'publish_date' => Carbon::create('2025', '03', '06', '19', '30', '00'), 'user_id' => 4, 'post_id' => 10],
            ['comment' => 'Lo que escribes es realmente útil. Me has ayudado a aclarar muchas dudas. Gracias.', 'publish_date' => Carbon::create('2025', '03', '06', '19', '45', '00'), 'user_id' => 5, 'post_id' => 10],
        ];
        
        foreach ($comments as $comment) {
            Comments::create($comment);
        }
        

        foreach ($comments as $comment) {
            Comments::create($comment);
        }
    }
}
