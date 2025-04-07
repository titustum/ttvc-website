<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        DB::table('departments')->insert([
            [
                'name' => 'Cosmetology',
                'photo' => 'https://tetutvc.ac.ke/storage/departments/jOFyZiPmrGGGuiEhrJFlcWxRqx158lzD0tZTGekp.jpg',
                'short_desc' => 'Master the art and science of Beauty Therapy and Hairdressing with our amazing programs.',
                'full_desc' => 'At our Cosmetology department, you will learn the skills necessary to become an expert in beauty therapy, hairdressing, and skincare. Our programs are designed to equip you with hands-on training and industry knowledge to thrive in the beauty industry.',
                'banner_pic' => 'https://tetutvc.ac.ke/storage/departments/IT6gSUrYTrSB4fDJKLysYLCR4dEAQ7XTJCPQVBKW.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hospitality',
                'photo' => 'https://tetutvc.ac.ke/storage/departments/kWuq7Td4hxRrpb2bCXaqQxXO0lHvQMT6ZDtz6XNm.jpg',
                'short_desc' => 'Excel in the Hospitality industry with our tailored courses in culinary arts, hotel management, and more.',
                'full_desc' => 'Our Hospitality department offers a wide range of courses that will prepare you for a successful career in the hospitality industry. Whether you’re interested in culinary arts, hotel management, or event planning, our programs will provide you with the skills and knowledge to succeed.',
                'banner_pic' => 'https://tetutvc.ac.ke/storage/departments/SybLxRAX6dFlyYq1lv0HRDNWRy6KhI3A8qrOwtWZ.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fashion and Textile',
                'photo' => 'https://tetutvc.ac.ke/storage/departments/TqucuW7SaoTwBMwuH12xh8qCcnn6j9YlGlYMISlP.jpg',
                'short_desc' => 'Unleash your creativity and style with our courses in fashion design and clothing technology.',
                'full_desc' => 'In the Fashion and Textile department, students explore the world of design, textile technology, and fashion trends. You’ll learn how to bring your fashion ideas to life, from creating your own garments to understanding the production process. Our courses blend creativity with technical skills.',
                'banner_pic' => 'https://tetutvc.ac.ke/storage/departments/sRZtDfqeK4hBuicWEgzwqyC8WFUtnS5LhDrBwrqC.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Building and Civil',
                'photo' => 'https://tetutvc.ac.ke/storage/departments/DvnNsp5y3RCpnrEmmiMKsujUGj5wEi33JTmsUivS.jpg',
                'short_desc' => 'Build a solid foundation for your future with our courses in construction and civil engineering.',
                'full_desc' => 'Our Building and Civil department provides you with essential skills in construction and civil engineering. Whether you want to design infrastructures, build structures, or manage construction projects, our programs will give you the technical expertise and practical experience needed to succeed in the industry.',
                'banner_pic' => 'https://tetutvc.ac.ke/storage/departments/448361321_1240050350703351_1054428585202860506_n.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Electrical',
                'photo' => 'https://tetutvc.ac.ke/storage/departments/8PUvNgI6uJTtyKXLy4Wl1z2GOATmbrHJ1gnFvsgI.jpg',
                'short_desc' => 'Light up your career with our specialized courses in electrical engineering and technology.',
                'full_desc' => 'Our Electrical department equips students with the knowledge and skills to thrive in the fast-paced world of electrical engineering. From learning about circuit design to understanding the latest in energy systems, our courses offer practical training to set you on a successful career path in this essential field.',
                'banner_pic' => 'https://tetutvc.ac.ke/storage/departments/LFKvsB6tHDgGMKWlMKpKGWc6soyaTXRJ3KaUHies.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ICT',
                'photo' => 'https://tetutvc.ac.ke/storage/departments/tetu-tvc-ict-practicals.jpg',
                'short_desc' => 'Stay ahead in the digital age with our cutting-edge ICT courses and training programs.',
                'full_desc' => 'Our ICT department offers comprehensive courses in information technology, including software development, networking, and data management. Gain hands-on experience with the latest technologies and stay ahead of the curve in the rapidly evolving tech industry.',
                'banner_pic' => 'https://tetutvc.ac.ke/storage/departments/GDpiw9vXcAANtsG.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Agriculture',
                'photo' => 'https://tetutvc.ac.ke/storage/departments/KhfdVW5sH1olvnj36m4t5e0fpvJSr6S1e4CsuXa8.jpg',
                'short_desc' => 'Cultivate your future with our comprehensive agricultural courses and training programs.',
                'full_desc' => 'Our Agriculture department prepares students to become leaders in the agricultural industry. Whether you\'re interested in crop production, sustainable farming, or agricultural technology, we offer programs that provide hands-on experience and theoretical knowledge in the latest agricultural practices.',
                'banner_pic' => 'https://scontent-mba2-1.xx.fbcdn.net/v/t39.30808-6/475466774_1414557589919292_1867040391398665052_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeEFzqMvVvaSdKLQmAoyqsw0iyK94gUle3-LIr3iBSV7f86yDBjUlF16nZINPyGZg0_h6_7OOgHqKYRMgSXb85zi&_nc_ohc=CjJv8U5mUAIQ7kNvwFMTei1&_nc_oc=AdkPe-A6FQD3ycN1m-SJjyxYnDh7XFuPuiEWJdFuXGQJqdXtx5u6qn_CUSp0DtXrGHE&_nc_zt=23&_nc_ht=scontent-mba2-1.xx&_nc_gid=l9Usy9WvCIISxfBWFjcNFw&oh=00_AfHi-IDeZXtket_NVaggBDDQa7swe_1jRCLgV1DH8iUi7A&oe=67FA3195',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mechanical',
                'photo' => 'https://burycollegewebstore.blob.core.windows.net/uploads/cc5918e5-be5e-4b5c-ae9e-ef0f77450500/Voc_Engineering1_1296x600_1296x800.jpg',  // Add an appropriate photo for the Mechanical department
                'short_desc' => 'Engineered for success, our Mechanical department offers hands-on training in machinery and manufacturing.',
                'full_desc' => 'The Mechanical department focuses on the principles of mechanical engineering, including the design, analysis, and maintenance of machines and mechanical systems. Our courses provide students with in-depth knowledge of thermodynamics, robotics, and mechanical design, preparing them for a career in various industries.',
                'banner_pic' => 'https://scontent-mba2-1.xx.fbcdn.net/v/t39.30808-6/473740613_1403218717719846_5507242129373951757_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeEf_IQ_XDb5WfAW0MFXlC-kG3GrevmphEUbcat6-amERfl5EPAPwYqXs1ztIQYXQutdWcNcm5QhwCVwDFTISUDa&_nc_ohc=3cBXH7mWVWIQ7kNvwGKUQ3k&_nc_oc=Adlnwv3Kbpihm4P5KohihslQSipK_Nmsb_PVYKWx571KTKYMcxX35syakLiWEjTgilo&_nc_zt=23&_nc_ht=scontent-mba2-1.xx&_nc_gid=ZbCMh2Ez1bBWeclK4moZgA&oh=00_AfGYR07u5cX9QsdXsjUGPk0GMRJmPqcy6WFWnY5dVHCGOA&oe=67FA2C44',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
