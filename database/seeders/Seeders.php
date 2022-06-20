<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Seeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();
        $regions = [
            [1, 'Arica y Parinacota', 'XV'],
            [2, 'Tarapacá', 'I'],
            [3, 'Antofagasta', 'II'],
            [4, 'Atacama', 'III'],
            [5, 'Coquimbo', 'IV'],
            [6, 'Valparaiso', 'V'],
            [7, 'Metropolitana de Santiago', 'RM'],
            [8, 'Libertador General Bernardo O\'Higgins', 'VI'],
            [9, 'Maule', 'VII'],
            [10, 'Biobío', 'VIII'],
            [11, 'La Araucanía', 'IX'],
            [12, 'Los Ríos', 'XIV'],
            [13, 'Los Lagos', 'X'],
            [14, 'Aisén del General Carlos Ibáñez del Campo', 'XI'],
            [15, 'Magallanes y de la Antártica Chilena', 'XII'],
        ];

        $regions = array_map(function ($region) use ($now) {
            return [
                'id' => $region[0],
                'nombre' => $region[1],
                'ordinal' => $region[2],
                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $regions);

        \DB::table('regions')->insert($regions);

        $comunas = [
            [1, 'Arica', 1],
            [2, 'Camarones', 1],
            [3, 'General Lagos', 1],
            [4, 'Putre', 1],
            [5, 'Alto Hospicio', 2],
            [6, 'Iquique', 2],
            [7, 'Camiña', 2],
            [8, 'Colchane', 2],
            [9, 'Huara', 2],
            [10, 'Pica', 2],
            [11, 'Pozo Almonte', 2],
            [12, 'Antofagasta', 3],
            [13, 'Mejillones', 3],
            [14, 'Sierra Gorda', 3],
            [15, 'Taltal', 3],
            [16, 'Calama', 3],
            [17, 'Ollague', 3],
            [18, 'San Pedro de Atacama', 3],
            [19, 'María Elena', 3],
            [20, 'Tocopilla', 3],
            [21, 'Chañaral', 4],
            [22, 'Diego de Almagro', 4],
            [23, 'Caldera', 4],
            [24, 'Copiapó', 4],
            [25, 'Tierra Amarilla', 4],
            [26, 'Alto del Carmen', 4],
            [27, 'Freirina', 4],
            [28, 'Huasco', 4],
            [29, 'Vallenar', 4],
            [30, 'Canela', 5],
            [31, 'Illapel', 5],
            [32, 'Los Vilos', 5],
            [33, 'Salamanca', 5],
            [34, 'Andacollo', 5],
            [35, 'Coquimbo', 5],
            [36, 'La Higuera', 5],
            [37, 'La Serena', 5],
            [38, 'Paihuaco', 5],
            [39, 'Vicuña', 5],
            [40, 'Combarbalá', 5],
            [41, 'Monte Patria', 5],
            [42, 'Ovalle', 5],
            [43, 'Punitaqui', 5],
            [44, 'Río Hurtado', 5],
            [45, 'Isla de Pascua', 6],
            [46, 'Calle Larga', 6],
            [47, 'Los Andes', 6],
            [48, 'Rinconada', 6],
            [49, 'San Esteban', 6],
            [50, 'La Ligua', 6],
            [51, 'Papudo', 6],
            [52, 'Petorca', 6],
            [53, 'Zapallar', 6],
            [54, 'Hijuelas', 6],
            [55, 'La Calera', 6],
            [56, 'La Cruz', 6],
            [57, 'Limache', 6],
            [58, 'Nogales', 6],
            [59, 'Olmué', 6],
            [60, 'Quillota', 6],
            [61, 'Algarrobo', 6],
            [62, 'Cartagena', 6],
            [63, 'El Quisco', 6],
            [64, 'El Tabo', 6],
            [65, 'San Antonio', 6],
            [66, 'Santo Domingo', 6],
            [67, 'Catemu', 6],
            [68, 'Llaillay', 6],
            [69, 'Panquehue', 6],
            [70, 'Putaendo', 6],
            [71, 'San Felipe', 6],
            [72, 'Santa María', 6],
            [73, 'Casablanca', 6],
            [74, 'Concón', 6],
            [75, 'Juan Fernández', 6],
            [76, 'Puchuncaví', 6],
            [77, 'Quilpué', 6],
            [78, 'Quintero', 6],
            [79, 'Valparaíso', 6],
            [80, 'Villa Alemana', 6],
            [81, 'Viña del Mar', 6],
            [82, 'Colina', 7],
            [83, 'Lampa', 7],
            [84, 'Tiltil', 7],
            [85, 'Pirque', 7],
            [86, 'Puente Alto', 7],
            [87, 'San José de Maipo', 7],
            [88, 'Buin', 7],
            [89, 'Calera de Tango', 7],
            [90, 'Paine', 7],
            [91, 'San Bernardo', 7],
            [92, 'Alhué', 7],
            [93, 'Curacaví', 7],
            [94, 'María Pinto', 7],
            [95, 'Melipilla', 7],
            [96, 'San Pedro', 7],
            [97, 'Cerrillos', 7],
            [98, 'Cerro Navia', 7],
            [99, 'Conchalí', 7],
            [100, 'El Bosque', 7],
            [101, 'Estación Central', 7],
            [102, 'Huechuraba', 7],
            [103, 'Independencia', 7],
            [104, 'La Cisterna', 7],
            [105, 'La Granja', 7],
            [106, 'La Florida', 7],
            [107, 'La Pintana', 7],
            [108, 'La Reina', 7],
            [109, 'Las Condes', 7],
            [110, 'Lo Barnechea', 7],
            [111, 'Lo Espejo', 7],
            [112, 'Lo Prado', 7],
            [113, 'Macul', 7],
            [114, 'Maipú', 7],
            [115, 'Ñuñoa', 7],
            [116, 'Pedro Aguirre Cerda', 7],
            [117, 'Peñalolén', 7],
            [118, 'Providencia', 7],
            [119, 'Pudahuel', 7],
            [120, 'Quilicura', 7],
            [121, 'Quinta Normal', 7],
            [122, 'Recoleta', 7],
            [123, 'Renca', 7],
            [124, 'San Miguel', 7],
            [125, 'San Joaquín', 7],
            [126, 'San Ramón', 7],
            [127, 'Santiago', 7],
            [128, 'Vitacura', 7],
            [129, 'El Monte', 7],
            [130, 'Isla de Maipo', 7],
            [131, 'Padre Hurtado', 7],
            [132, 'Peñaflor', 7],
            [133, 'Talagante', 7],
            [134, 'Codegua', 8],
            [135, 'Coínco', 8],
            [136, 'Coltauco', 8],
            [137, 'Doñihue', 8],
            [138, 'Graneros', 8],
            [139, 'Las Cabras', 8],
            [140, 'Machalí', 8],
            [141, 'Malloa', 8],
            [142, 'Mostazal', 8],
            [143, 'Olivar', 8],
            [144, 'Peumo', 8],
            [145, 'Pichidegua', 8],
            [146, 'Quinta de Tilcoco', 8],
            [147, 'Rancagua', 8],
            [148, 'Rengo', 8],
            [149, 'Requínoa', 8],
            [150, 'San Vicente de Tagua Tagua', 8],
            [151, 'La Estrella', 8],
            [152, 'Litueche', 8],
            [153, 'Marchihue', 8],
            [154, 'Navidad', 8],
            [155, 'Peredones', 8],
            [156, 'Pichilemu', 8],
            [157, 'Chépica', 8],
            [158, 'Chimbarongo', 8],
            [159, 'Lolol', 8],
            [160, 'Nancagua', 8],
            [161, 'Palmilla', 8],
            [162, 'Peralillo', 8],
            [163, 'Placilla', 8],
            [164, 'Pumanque', 8],
            [165, 'San Fernando', 8],
            [166, 'Santa Cruz', 8],
            [167, 'Cauquenes', 9],
            [168, 'Chanco', 9],
            [169, 'Pelluhue', 9],
            [170, 'Curicó', 9],
            [171, 'Hualañé', 9],
            [172, 'Licantén', 9],
            [173, 'Molina', 9],
            [174, 'Rauco', 9],
            [175, 'Romeral', 9],
            [176, 'Sagrada Familia', 9],
            [177, 'Teno', 9],
            [178, 'Vichuquén', 9],
            [179, 'Colbún', 9],
            [180, 'Linares', 9],
            [181, 'Longaví', 9],
            [182, 'Parral', 9],
            [183, 'Retiro', 9],
            [184, 'San Javier', 9],
            [185, 'Villa Alegre', 9],
            [186, 'Yerbas Buenas', 9],
            [187, 'Constitución', 9],
            [188, 'Curepto', 9],
            [189, 'Empedrado', 9],
            [190, 'Maule', 9],
            [191, 'Pelarco', 9],
            [192, 'Pencahue', 9],
            [193, 'Río Claro', 9],
            [194, 'San Clemente', 9],
            [195, 'San Rafael', 9],
            [196, 'Talca', 9],
            [197, 'Arauco', 10],
            [198, 'Cañete', 10],
            [199, 'Contulmo', 10],
            [200, 'Curanilahue', 10],
            [201, 'Lebu', 10],
            [202, 'Los Álamos', 10],
            [203, 'Tirúa', 10],
            [204, 'Alto Biobío', 10],
            [205, 'Antuco', 10],
            [206, 'Cabrero', 10],
            [207, 'Laja', 10],
            [208, 'Los Ángeles', 10],
            [209, 'Mulchén', 10],
            [210, 'Nacimiento', 10],
            [211, 'Negrete', 10],
            [212, 'Quilaco', 10],
            [213, 'Quilleco', 10],
            [214, 'San Rosendo', 10],
            [215, 'Santa Bárbara', 10],
            [216, 'Tucapel', 10],
            [217, 'Yumbel', 10],
            [218, 'Chiguayante', 10],
            [219, 'Concepción', 10],
            [220, 'Coronel', 10],
            [221, 'Florida', 10],
            [222, 'Hualpén', 10],
            [223, 'Hualqui', 10],
            [224, 'Lota', 10],
            [225, 'Penco', 10],
            [226, 'San Pedro de La Paz', 10],
            [227, 'Santa Juana', 10],
            [228, 'Talcahuano', 10],
            [229, 'Tomé', 10],
            [230, 'Bulnes', 10],
            [231, 'Chillán', 10],
            [232, 'Chillán Viejo', 10],
            [233, 'Cobquecura', 10],
            [234, 'Coelemu', 10],
            [235, 'Coihueco', 10],
            [236, 'El Carmen', 10],
            [237, 'Ninhue', 10],
            [238, 'Ñiquen', 10],
            [239, 'Pemuco', 10],
            [240, 'Pinto', 10],
            [241, 'Portezuelo', 10],
            [242, 'Quillón', 10],
            [243, 'Quirihue', 10],
            [244, 'Ránquil', 10],
            [245, 'San Carlos', 10],
            [246, 'San Fabián', 10],
            [247, 'San Ignacio', 10],
            [248, 'San Nicolás', 10],
            [249, 'Treguaco', 10],
            [250, 'Yungay', 10],
            [251, 'Carahue', 11],
            [252, 'Cholchol', 11],
            [253, 'Cunco', 11],
            [254, 'Curarrehue', 11],
            [255, 'Freire', 11],
            [256, 'Galvarino', 11],
            [257, 'Gorbea', 11],
            [258, 'Lautaro', 11],
            [259, 'Loncoche', 11],
            [260, 'Melipeuco', 11],
            [261, 'Nueva Imperial', 11],
            [262, 'Padre Las Casas', 11],
            [263, 'Perquenco', 11],
            [264, 'Pitrufquén', 11],
            [265, 'Pucón', 11],
            [266, 'Saavedra', 11],
            [267, 'Temuco', 11],
            [268, 'Teodoro Schmidt', 11],
            [269, 'Toltén', 11],
            [270, 'Vilcún', 11],
            [271, 'Villarrica', 11],
            [272, 'Angol', 11],
            [273, 'Collipulli', 11],
            [274, 'Curacautín', 11],
            [275, 'Ercilla', 11],
            [276, 'Lonquimay', 11],
            [277, 'Los Sauces', 11],
            [278, 'Lumaco', 11],
            [279, 'Purén', 11],
            [280, 'Renaico', 11],
            [281, 'Traiguén', 11],
            [282, 'Victoria', 11],
            [283, 'Corral', 12],
            [284, 'Lanco', 12],
            [285, 'Los Lagos', 12],
            [286, 'Máfil', 12],
            [287, 'Mariquina', 12],
            [288, 'Paillaco', 12],
            [289, 'Panguipulli', 12],
            [290, 'Valdivia', 12],
            [291, 'Futrono', 12],
            [292, 'La Unión', 12],
            [293, 'Lago Ranco', 12],
            [294, 'Río Bueno', 12],
            [295, 'Ancud', 13],
            [296, 'Castro', 13],
            [297, 'Chonchi', 13],
            [298, 'Curaco de Vélez', 13],
            [299, 'Dalcahue', 13],
            [300, 'Puqueldón', 13],
            [301, 'Queilén', 13],
            [302, 'Quemchi', 13],
            [303, 'Quellón', 13],
            [304, 'Quinchao', 13],
            [305, 'Calbuco', 13],
            [306, 'Cochamó', 13],
            [307, 'Fresia', 13],
            [308, 'Frutillar', 13],
            [309, 'Llanquihue', 13],
            [310, 'Los Muermos', 13],
            [311, 'Maullín', 13],
            [312, 'Puerto Montt', 13],
            [313, 'Puerto Varas', 13],
            [314, 'Osorno', 13],
            [315, 'Puero Octay', 13],
            [316, 'Purranque', 13],
            [317, 'Puyehue', 13],
            [318, 'Río Negro', 13],
            [319, 'San Juan de la Costa', 13],
            [320, 'San Pablo', 13],
            [321, 'Chaitén', 13],
            [322, 'Futaleufú', 13],
            [323, 'Hualaihué', 13],
            [324, 'Palena', 13],
            [325, 'Aisén', 14],
            [326, 'Cisnes', 14],
            [327, 'Guaitecas', 14],
            [328, 'Cochrane', 14],
            [329, 'O higgins', 14],
            [330, 'Tortel', 14],
            [331, 'Coihaique', 14],
            [332, 'Lago Verde', 14],
            [333, 'Chile Chico', 14],
            [334, 'Río Ibáñez', 14],
            [335, 'Antártica', 15],
            [336, 'Cabo de Hornos', 15],
            [337, 'Laguna Blanca', 15],
            [338, 'Punta Arenas', 15],
            [339, 'Río Verde', 15],
            [340, 'San Gregorio', 15],
            [341, 'Porvenir', 15],
            [342, 'Primavera', 15],
            [343, 'Timaukel', 15],
            [344, 'Natales', 15],
            [345, 'Torres del Paine', 15],
            [346, 'Cabildo', 6],
        ];

        $comunas = array_map(function ($comuna) use ($now) {
            return [
                'id' => $comuna[0],
                'nombre' => $comuna[1],
                'region_id' => $comuna[2],
                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $comunas);

        //App\Commune::insert($data); // Eloquent approach
        \DB::table('comunas')->insert($comunas); // Query Builder approach

        $tipoDeportes = [
            [1, 'Todos'],
            [2, 'Deportes al aire libre'],
            [3, 'Deporte de interiores'],
            [4, 'Deportes de balón'],
            [5, 'Deportes de motor'],
            [6, 'Deportes de tabla'],
            [7, 'Deportes de pscina'],
            [8, 'Deportes de ecuestres'],
            [9, 'Deportes con arma'],
            [10, 'eSports'],
            [11, 'Deportes de combate'],
            [12, 'Deportes individuales'],
            [13, 'Deportes dobles'],
            [14, 'Deportes de equipo'],
            [15, 'Deportes de contacto'],
            [16, 'Deportes de sin contacto'],
        ];
        $tipoDeportes = array_map(function ($tipoDeporte) use ($now) {
            return [
                'id' => $tipoDeporte[0],
                'tipoDeporte' => $tipoDeporte[1],
                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $tipoDeportes);

        \DB::table('tipo_deportes')->insert($tipoDeportes);

        $deportes = [
            [1, 'Paracaidismo', 'image/Deportes/Paracaidismo.jpg'],
            [2, 'Buceo', 'image/Deportes/Buceo.png'],
            [3, 'Ajedrez', 'image/Deportes/Ajedrez.jpg'],
            [4, 'Atletismo', 'image/Deportes/Atletismo.png'],
            [5, 'Karting', 'image/Deportes/Karting.jpg'],
            [6, 'Badminton', 'image/Deportes/Badminton.jpg'],
            [7, 'Basket', 'image/Deportes/Basket.jpg'],
            [8, 'Béisbol', 'image/Deportes/Beisbol.jpg'],
            [9, 'Bowling', 'image/Deportes/Bowling.jpg'],
            [10, 'Boxeo', 'image/Deportes/Boxeo.png'],
            [11, 'Ciclismo', 'image/Deportes/Ciclismo.png'],
            [12, 'Ciclismo de carrera', 'image/Deportes/Ciclismo-de-carrera.jpg'],
            [13, 'Ciclismo en pista', 'image/Deportes/Ciclismo-de-pista.png'],
            [14, 'Patinaje en hielo', 'image/Deportes/Patinaje-sobre-hielo.jpg'],
            [15, 'Squí', 'image/Deportes/Squi.png'],
            [16, 'Snowboard', 'image/Deportes/Snowboard.png'],
            [17, 'Esgrima', 'image/Deportes/Esgrima.png'],
            [18, 'Natación', 'image/Deportes/Natacion.png'],
            [19, 'Rugby', 'image/Deportes/Rugby.png'],
            [20, 'Tiro con arco', 'image/Deportes/Tiro-con-arco.png'],
            [21, 'Voleibol', 'image/Deportes/Voleibol.jpg'],
            [22, 'Aerobic', 'image/Deportes/Aerobic.png'],
            [23, 'Yoga', 'image/Deportes/Yoga.jpg'],
            [24, 'Fútbol', 'image/Deportes/Futbol.png'],
            [25, 'Fútbol playa', 'image/Deportes/Futbol-Playa.png'],
            [26, 'Fútbol-7', 'image/Deportes/Futbol.png'],
            [27, 'Fútbol-8', 'image/Deportes/Futbol.png'],
            [28, 'Golf', 'image/Deportes/Golf.png'],
            [29, 'Judo', 'image/Deportes/judo.png'],
            [30, 'Karate', 'image/Deportes/karate.png'],
            [31, 'kickboxing', 'image/Deportes/kickboxing.png'],
            [32, 'Escalada', 'image/Deportes/escalada.png'],
            [33, 'Remo', 'image/Deportes/remo.png'],
            [34, 'Surf', 'image/Deportes/surf.png'],
            [35, 'Tenis', 'image/Deportes/Tenis.jpg'],
            [36, 'Ping Pong', 'image/Deportes/ping-pong.jpg'],

        ];
        $deportes = array_map(function ($deporte) use ($now) {
            return [
                'id' => $deporte[0],
                'nombre' => $deporte[1],
                'link' => $deporte[2],
                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $deportes);

        \DB::table('deportes')->insert($deportes);

        $deporteTipoDeportes = [
            [1, 1],
            [2, 2],
            [3, 3],
            [4, 1],
            [5, 1],
            [6, 1],
            [7, 1],
            [8, 1],
            [9, 1],
            [10, 1],
            [11, 1],
            [12, 1],
            [13, 1],
            [14, 1],
            [15, 1],
            [16, 1],
        ];
        $deporteTipoDeportes = array_map(function ($deporteTipoDeporte) use ($now) {
            return [
                'deporte_id' => $deporteTipoDeporte[0],
                'tipo_deporte_id' => $deporteTipoDeporte[1],

            ];
        }, $deporteTipoDeportes);

        \DB::table('deporte_tipo_deporte')->insert($deporteTipoDeportes);

        $tipoUsuarios = [
            [1, 'Administrador'],
            [2, 'Moderador'],
            [3, 'Usuario nivel 1'],
            [4, 'Usuario nivel 2'],
        ];
        $tipoUsuarios = array_map(function ($tipoUsuario) use ($now) {
            return [
                'id' => $tipoUsuario[0],
                'tipoUsuario' => $tipoUsuario[1],
                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $tipoUsuarios);

        \DB::table('tipo_usuarios')->insert($tipoUsuarios);

        $usuarios = [
            [1, 'Diego', 'Retamal', 'Pacheco', 'diego@gmail.com', 1, 1, 'Diegoo1.', 975424380, 'Chile', '1999-02-09', 22, 202026672, '20211017041658.jpg', '0270 Millantu Puente Alto', 'Puente Alto', 'Región Metropolitana'],
            [2, 'Javiera', 'Novoa', 'Pacheco', 'javiera@gmail.com', 3, 1, 'Diegoo1.', 975412154, 'Chile', '2000-12-24', 20, 206548754, '20211216035817.PNG', '0270 Millantu Puente Alto', 'Puente Alto', 'Región Metropolitana'],
            [3, 'Vicente', 'Novoa', 'Pacheco', 'vicente@gmail.com', 2, 1, 'Diegoo1.', 978546985, 'Chile', '2007-11-13', 14, 225594341, '20211018024808.PNG', '0270 Millantu Puente Alto', 'Puente Alto', 'Región Metropolitana'],

        ];

        $usuarios = array_map(function ($usuarios) use ($now) {

            return [
                'id' => $usuarios[0],
                'name' => $usuarios[1],
                'apellido_paterno' => $usuarios[2],
                'apellido_materno' => $usuarios[3],
                'email' => $usuarios[4],
                'email_verified_at' => $now,
                'rol' => $usuarios[5],
                'estado' => $usuarios[6],
                'password' => Hash::make($usuarios[7]),
                'numero_telefono' => $usuarios[8],
                'nacionalidad' => $usuarios[9],
                'fecha_nacimiento' => $usuarios[10],
                'edad' => $usuarios[11],
                'rut' => $usuarios[12],
                'foto' => $usuarios[13],
                'direccion' => $usuarios[14],
                'comuna' => $usuarios[15],
                'region' => $usuarios[16],
                'created_at' => $now,
                'updated_at' => $now,
            ];

        }, $usuarios);

        \DB::table('users')->insert($usuarios);

        $equipos = [
            [1, 'Colo-Colo', 27, 1, '20211206023833.jpg'],
            [2, 'Universidad Catolica', 27, 1, '20211206024057.jpg'],
            [3, 'Audax Italiano', 27, 1, '20211206023814.jpg'],
            [4, 'Union Espanola', 27, 1, '20211206024034.jpg'],
            [5, 'Union La Calera', 27, 1, '20211206024047.jpg'],
            [6, 'Antofagasta', 27, 1, '20211130020028.jpg'],
            [7, 'Everton', 27, 1, '20211206023856.jpg'],
            [8, 'Cobresal', 27, 1, '20211206023824.jpg'],
            [9, 'Nublense', 27, 1, '20211206023941.jpg'],
            [10, 'Palestino', 27, 1, '20211206024010.jpg'],
            [11, 'La Serena', 27, 1, '20211206023918.jpg'],
            [12, 'Universidad De Chile', 27, 1, '20211206024110.jpg'],
            [13, 'Melipilla', 27, 1, '20211206023929.jpg'],
            [14, 'O´Higgins', 27, 1, '20211206023954.jpg'],
            [15, 'Curico Unido', 27, 1, '20211206023843.jpg'],
            [16, 'Huachipato', 27, 1, '20211206023905.jpg'],
            [17, 'Santiago Wanderers', 27, 1, '20211206024023.jpg'],
        ];

        $teams = $equipos;

        $equipos = array_map(function ($equipos) use ($now) {
            return [
                'id' => $equipos[0],
                'nombreEquipo' => $equipos[1],
                'descripcion' => null,
                'miembros' => 1,
                'capacidad' => 25,
                'privacidad' => 0,
                'foto' => $equipos[4],
                'borrado_equipo' => null,
                'deporte_id' => $equipos[2],
                'usuario_id' => $equipos[3],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }, $equipos);

        DB::table('equipos')->insert($equipos);

        $torneo = [
            ['torneo 1', 'millantu 0270', "2021-11-26", "00:00:00", 8, 7, 0, 1],
            ['torneo 2', 'millantu 0270', "2021-11-26", "00:00:00", 16, 15, 1, 1],
        ];

        $torneo = array_map(function ($torneo) use ($now) {
            return [
                'nombre' => $torneo[0],
                'direccion_torneo' => $torneo[1],
                'fecha' => $torneo[2],
                'hora' => $torneo[3],
                'cantidad_equipos' => $torneo[4],
                'inscritos' => $torneo[5],
                'tipo_torneo' => $torneo[6],
                'deporte_id' => $torneo[7],
            ];
        }, $torneo);
        \DB::table('torneos')->insert($torneo);

        $evento = [
            ['Partido 1', '2021-12-25', '15:00:00', 'ubicacion1', 1, 14, 26, 1],
            ['Partido 2', '2021-12-25', '15:00:00', 'ubicacion1', 1, 14, 26, 1],
            ['Partido 3', '2021-12-25', '15:00:00', 'ubicacion1', 1, 14, 26, 1],
            ['Partido 4', '2021-12-25', '15:00:00', 'ubicacion1', 1, 14, 26, 1],
            ['Partido 5', '2021-12-25', '15:00:00', 'ubicacion1', 1, 14, 26, 1],
        ];

        $evento = array_map(function ($evento) use ($now) {
            return [
                'nombreEvento' => $evento[0],
                'fechaEvento' => $evento[1],
                'horaEvento' => $evento[2],
                'ubicacionEvento' => $evento[3],
                'estado' => $evento[4],
                'participantesTotales' => $evento[5],
                'deporte_id' => $evento[6],
                'usuario_id' => $evento[7],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }, $evento);
        \DB::table('eventos')->insert($evento);

        $complejos = [
            ['Complejo Deportivo Full Calcio', 'Los Castaños 1571, Puente Alto, Región Metropolitana', 4, 3],
            ['Futbolito GEO', 'Camino A San José del Maipo 07820, Puente Alto, Región Metropolitana', 5, 3],
            ['Complejo Deportivo El Peral', 'Av. Camilo Henríquez 4617, Puente Alto, Región Metropolitana', 3, 3],
        ];

        $complejos = array_map(function ($complejos) use ($now) {
            return [
                'nombre' => $complejos[0],
                'ubicacion' => $complejos[1],
                'cantCanchas' => $complejos[2],
                'usuario_id' => $complejos[3],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }, $complejos);

        \DB::table('complejos_deportivos')->insert($complejos);

        $canchas = [
            ['Cancha 1', 1],
            ['Cancha 2', 1],
            ['Cancha 3', 1],
            ['Cancha 4', 1],
            ['Cancha 1', 2],
            ['Cancha 2', 2],
            ['Cancha 3', 2],
            ['Cancha 4', 2],
            ['Cancha 5', 2],
            ['Cancha 1', 3],
            ['Cancha 2', 3],
            ['Cancha 3', 3],
        ];

        $canchas = array_map(function ($canchas) use ($now) {
            return [
                'nombre' => $canchas[0],
                'complejo_id' => $canchas[1],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }, $canchas);

        \DB::table('canchas')->insert($canchas);

        $puntuacions = [

            [1, 0, 'Primer Torneo', 1, 1],
            [2, 0, 'Primer Torneo', 1, 2],
            [3, 0, 'Primer Torneo', 1, 3],
            [4, 0, 'Primer Torneo', 1, 4],
            [5, 0, 'Primer Torneo', 1, 5],
            [6, 0, 'Primer Torneo', 1, 6],
            [7, 0, 'Primer Torneo', 1, 7],
            
        ];

        $puntuacions = array_map(function ($puntuacions) use ($now) {
            return [

                'posicion' => $puntuacions[0],
                'estado' => $puntuacions[1],
                'torneo_nombre' => $puntuacions[2],
                'torneo_id' => $puntuacions[3],
                'equipo_id' => $puntuacions[4],
            ];
        }, $puntuacions);

        \DB::table('puntuacions')->insert($puntuacions);

        $puntuacions = [

            [1, 0, 'Primer Torneo', 2, 1],
            [2, 0, 'Primer Torneo', 2, 2],
            [3, 0, 'Primer Torneo', 2, 3],
            [4, 0, 'Primer Torneo', 2, 4],
            [5, 0, 'Primer Torneo', 2, 5],
            [6, 0, 'Primer Torneo', 2, 6],
            [7, 0, 'Primer Torneo', 2, 7],
            [8, 0, 'Primer Torneo', 2, 8],
            [9, 0, 'Primer Torneo', 2, 9],
            [10, 0, 'Primer Torneo', 2, 10],
            [11, 0, 'Primer Torneo', 2, 11],
            [12, 0, 'Primer Torneo', 2, 12],
            [13, 0, 'Primer Torneo', 2, 13],
            [14, 0, 'Primer Torneo', 2, 14],
            [15, 0, 'Primer Torneo', 2, 15],
            
        ];

        $puntuacions = array_map(function ($puntuacions) use ($now) {
            return [
                'posicion' => $puntuacions[0],
                'estado' => $puntuacions[1],
                'torneo_nombre' => $puntuacions[2],
                'torneo_id' => $puntuacions[3],
                'equipo_id' => $puntuacions[4],
            ];
        }, $puntuacions);

        \DB::table('puntuacions')->insert($puntuacions);

        $integrantes_equipos = [
            [1, 1, 1],
            [1, 2, 1],
            [1, 3, 1],
            [1, 4, 1],
            [1, 5, 1],
            [1, 6, 1],
            [1, 7, 1],
            [1, 8, 1],
            [1, 9, 1],
            [1, 10, 1],
            [1, 11, 1],
            [1, 12, 1],
            [1, 13, 1],
            [1, 14, 1],
            [1, 15, 1],
            [1, 16, 1],
            [1, 17, 1],
        ];

        $integrantes_equipos = array_map(function ($integrantes_equipos) use ($now) {
            //dd($teams["id"]);
            return [
                'usuario_id' => $integrantes_equipos[0],
                'equipo_id' => $integrantes_equipos[1],
                'fundador' => $integrantes_equipos[2],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }, $integrantes_equipos);
        DB::table('integrantes_equipos')->insert($integrantes_equipos);

        /*$usuarioTipoUsuario = [
    [1, 1],
    [2, 2],
    [3, 3],
    [4, 4],
    ];

    $usuarioTipoUsuario = array_map(function ($usuarioTipoUsuario) use ($now) {
    return [
    'usuario_id' => $usuarioTipoUsuario[0],
    'tipo_usuario_id' => $usuarioTipoUsuario[1],
    ];
    }, $usuarioTipoUsuario);

    \DB::table('usuario_tipo_usuario')->insert($usuarioTipoUsuario);*/
    }
}
