<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            [ 'id' => 1, 'country_id' => 1, 'name' => 'Beni', 'iso_2' => 'B', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 2, 'country_id' => 1, 'name' => 'Oruro', 'iso_2' => 'O', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 3, 'country_id' => 1, 'name' => 'Santa Cruz', 'iso_2' => 'S', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 4, 'country_id' => 1, 'name' => 'Tarija', 'iso_2' => 'T', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 5, 'country_id' => 1, 'name' => 'Pando', 'iso_2' => 'N', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 6, 'country_id' => 1, 'name' => 'La Paz', 'iso_2' => 'L', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 7, 'country_id' => 1, 'name' => 'Cochabamba', 'iso_2' => 'C', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 8, 'country_id' => 1, 'name' => 'Chuquisaca', 'iso_2' => 'H', 'created_at' => now(), 'updated_at' => now(),],
            [ 'id' => 9, 'country_id' => 1, 'name' => 'Potosí', 'iso_2' => 'P', 'created_at' => now(), 'updated_at' => now(), ],

            [ 'id' => 10, 'country_id' => 2, 'name' => 'Quindío', 'iso_2' => 'QUI', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 11, 'country_id' => 2, 'name' => 'Cundinamarca', 'iso_2' => 'CUN', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 12, 'country_id' => 2, 'name' => 'Chocó', 'iso_2' => 'CHO', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 13, 'country_id' => 2, 'name' => 'Norte de Santander', 'iso_2' => 'NSA', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 14, 'country_id' => 2, 'name' => 'Meta', 'iso_2' => 'MET', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 15, 'country_id' => 2, 'name' => 'Risaralda', 'iso_2' => 'RIS', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 16, 'country_id' => 2, 'name' => 'Atlántico', 'iso_2' => 'ATL', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 17, 'country_id' => 2, 'name' => 'Arauca', 'iso_2' => 'ARA', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 18, 'country_id' => 2, 'name' => 'Guainía', 'iso_2' => 'GUA', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 19, 'country_id' => 2, 'name' => 'Tolima', 'iso_2' => 'TOL', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 20, 'country_id' => 2, 'name' => 'Cauca', 'iso_2' => 'CAU', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 21, 'country_id' => 2, 'name' => 'Vaupés', 'iso_2' => 'VAU', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 22, 'country_id' => 2, 'name' => 'Magdalena', 'iso_2' => 'MAG', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 23, 'country_id' => 2, 'name' => 'Caldas', 'iso_2' => 'CAL', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 24, 'country_id' => 2, 'name' => 'Guaviare', 'iso_2' => 'GUV', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 25, 'country_id' => 2, 'name' => 'La Guajira', 'iso_2' => 'LAG', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 26, 'country_id' => 2, 'name' => 'Antioquia', 'iso_2' => 'ANT', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 27, 'country_id' => 2, 'name' => 'Caquetá', 'iso_2' => 'CAQ', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 28, 'country_id' => 2, 'name' => 'Casanare', 'iso_2' => 'CAS', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 29, 'country_id' => 2, 'name' => 'Bolívar', 'iso_2' => 'BOL', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 30, 'country_id' => 2, 'name' => 'Vichada', 'iso_2' => 'VID', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 31, 'country_id' => 2, 'name' => 'Amazonas', 'iso_2' => 'AMA', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 32, 'country_id' => 2, 'name' => 'Putumayo', 'iso_2' => 'PUT', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 33, 'country_id' => 2, 'name' => 'Nariño', 'iso_2' => 'NAR', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 34, 'country_id' => 2, 'name' => 'Córdoba', 'iso_2' => 'COR', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 35, 'country_id' => 2, 'name' => 'Cesar', 'iso_2' => 'CES', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 36, 'country_id' => 2, 'name' => 'Archipiélago de San Andrés, Providencia y Santa Catalina', 'iso_2' => 'SAP', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 37, 'country_id' => 2, 'name' => 'Santander', 'iso_2' => 'SAN', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 38, 'country_id' => 2, 'name' => 'Sucre', 'iso_2' => 'SUC', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 39, 'country_id' => 2, 'name' => 'Boyacá', 'iso_2' => 'BOY', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 40, 'country_id' => 2, 'name' => 'Valle del Cauca', 'iso_2' => 'VAC', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 41, 'country_id' => 2, 'name' => 'Huila', 'iso_2' => 'HUI', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 42, 'country_id' => 2, 'name' => 'Bogotá D.C.', 'iso_2' => 'DC', 'created_at' => now(), 'updated_at' => now(), ],

            [ 'id' => 43, 'country_id' => 3, 'name' => 'Chihuahua', 'iso_2' => 'CHH', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 44, 'country_id' => 3, 'name' => 'Oaxaca', 'iso_2' => 'OAX', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 45, 'country_id' => 3, 'name' => 'Sinaloa', 'iso_2' => 'SIN', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 46, 'country_id' => 3, 'name' => 'Estado de México', 'iso_2' => 'MEX', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 47, 'country_id' => 3, 'name' => 'Chiapas', 'iso_2' => 'CHP', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 48, 'country_id' => 3, 'name' => 'Nuevo León', 'iso_2' => 'NLE', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 49, 'country_id' => 3, 'name' => 'Durango', 'iso_2' => 'DUR', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 50, 'country_id' => 3, 'name' => 'Tabasco', 'iso_2' => 'TAB', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 51, 'country_id' => 3, 'name' => 'Querétaro', 'iso_2' => 'QUE', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 52, 'country_id' => 3, 'name' => 'Aguascalientes', 'iso_2' => 'AGU', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 53, 'country_id' => 3, 'name' => 'Baja California', 'iso_2' => 'BCN', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 54, 'country_id' => 3, 'name' => 'Tlaxcala', 'iso_2' => 'TLA', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 55, 'country_id' => 3, 'name' => 'Guerrero', 'iso_2' => 'GRO', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 56, 'country_id' => 3, 'name' => 'Baja California Sur', 'iso_2' => 'BCS', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 57, 'country_id' => 3, 'name' => 'San Luis Potosí', 'iso_2' => 'SLP', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 58, 'country_id' => 3, 'name' => 'Zacatecas', 'iso_2' => 'ZAC', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 59, 'country_id' => 3, 'name' => 'Tamaulipas', 'iso_2' => 'TAM', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 60, 'country_id' => 3, 'name' => 'Veracruz de Ignacio de la Llave', 'iso_2' => 'VER', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 61, 'country_id' => 3, 'name' => 'Morelos', 'iso_2' => 'MOR', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 62, 'country_id' => 3, 'name' => 'Yucatán', 'iso_2' => 'YUC', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 63, 'country_id' => 3, 'name' => 'Quintana Roo', 'iso_2' => 'ROO', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 64, 'country_id' => 3, 'name' => 'Sonora', 'iso_2' => 'SON', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 65, 'country_id' => 3, 'name' => 'Guanajuato', 'iso_2' => 'GUA', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 66, 'country_id' => 3, 'name' => 'Hidalgo', 'iso_2' => 'HID', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 67, 'country_id' => 3, 'name' => 'Coahuila de Zaragoza', 'iso_2' => 'COA', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 68, 'country_id' => 3, 'name' => 'Colima', 'iso_2' => 'COL', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 69, 'country_id' => 3, 'name' => 'Ciudad de México', 'iso_2' => 'CDMX', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 70, 'country_id' => 3, 'name' => 'Michoacán de Ocampo', 'iso_2' => 'MIC', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 71, 'country_id' => 3, 'name' => 'Campeche', 'iso_2' => 'CAM', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 72, 'country_id' => 3, 'name' => 'Puebla', 'iso_2' => 'PUE', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 73, 'country_id' => 3, 'name' => 'Nayarit', 'iso_2' => 'NAY', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 74, 'country_id' => 3, 'name' => 'Jalisco', 'iso_2' => 'JAL', 'created_at' => now(), 'updated_at' => now(), ],

            [ 'id' => 75, 'country_id' => 4, 'name' => 'Madre de Dios', 'iso_2' => 'MDD', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 76, 'country_id' => 4, 'name' => 'Huancavelica', 'iso_2' => 'HUV', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 77, 'country_id' => 4, 'name' => 'Áncash', 'iso_2' => 'ANC', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 78, 'country_id' => 4, 'name' => 'Arequipa', 'iso_2' => 'ARE', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 79, 'country_id' => 4, 'name' => 'Puno', 'iso_2' => 'PUN', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 80, 'country_id' => 4, 'name' => 'La Libertad', 'iso_2' => 'LAL', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 81, 'country_id' => 4, 'name' => 'Ucayali', 'iso_2' => 'UCA', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 82, 'country_id' => 4, 'name' => 'Amazonas', 'iso_2' => 'AMA', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 83, 'country_id' => 4, 'name' => 'Pasco', 'iso_2' => 'PAS', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 84, 'country_id' => 4, 'name' => 'Huanuco', 'iso_2' => 'HUC', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 85, 'country_id' => 4, 'name' => 'Cajamarca', 'iso_2' => 'CAJ', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 86, 'country_id' => 4, 'name' => 'Tumbes', 'iso_2' => 'TUM', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 87, 'country_id' => 4, 'name' => 'Cusco', 'iso_2' => 'CUS', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 88, 'country_id' => 4, 'name' => 'Ayacucho', 'iso_2' => 'AYA', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 89, 'country_id' => 4, 'name' => 'Junín', 'iso_2' => 'JUN', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 90, 'country_id' => 4, 'name' => 'San Martín', 'iso_2' => 'SAM', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 91, 'country_id' => 4, 'name' => 'Lima', 'iso_2' => 'LIM', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 92, 'country_id' => 4, 'name' => 'Tacna', 'iso_2' => 'TAC', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 93, 'country_id' => 4, 'name' => 'Piura', 'iso_2' => 'PIU', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 94, 'country_id' => 4, 'name' => 'Moquegua', 'iso_2' => 'MOQ', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 95, 'country_id' => 4, 'name' => 'Apurímac', 'iso_2' => 'APU', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 96, 'country_id' => 4, 'name' => 'Ica', 'iso_2' => 'ICA', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 97, 'country_id' => 4, 'name' => 'Callao', 'iso_2' => 'CAL', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 98, 'country_id' => 4, 'name' => 'Lambayeque', 'iso_2' => 'LAM', 'created_at' => now(), 'updated_at' => now(), ],
            [ 'id' => 99, 'country_id' => 4, 'name' => 'Loreto', 'iso_2' => 'LOR', 'created_at' => now(), 'updated_at' => now(), ],
        ];
        State::insert($states);
    }
}
