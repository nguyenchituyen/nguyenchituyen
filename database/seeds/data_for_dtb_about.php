<?php

use Illuminate\Database\Seeder;

class data_for_dtb_about extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dtb_abouts')->insert([
            'title' => 'Công Ty TNHH S-cubism VIETNAM',
            'contents' => '
                <p>Phần giới thiệu về c&ocirc;ng ty S-cubism VietNam</p>
                <ul>
                    <li>Phần giới thiệu về c&ocirc;ng ty S-cubism VietNam&nbsp;Phần giới thiệu về c&ocirc;ng ty S-cubism VietNam&nbsp;Phần giới thiệu về c&ocirc;ng ty S-cubism VietNam&nbsp</li>
                    <li>Phần giới thiệu về c&ocirc;ng ty S-cubism VietNam&nbsp;Phần giới thiệu về c&ocirc;ng ty S-cubism VietNam</li>
                    <li>Phần giới thiệu về c&ocirc;ng ty S-cubism VietNam&nbsp;Phần giới thiệu về c&ocirc;ng ty S-cubism VietNam</li>
                </ul>
                <p>Phần giới thiệu về c&ocirc;ng ty S-cubism VietNam&nbsp;Phần giới thiệu về c&ocirc;ng ty S-cubism VietNam&nbsp;Phần giới thiệu về c&ocirc;ng ty S-cubism VietNam</p>
                <p>Phần giới thiệu về c&ocirc;ng ty S-cubism VietNam&nbsp;Phần giới thiệu về c&ocirc;ng ty S-cubism VietNam</p>
                <p>Phần giới thiệu về c&ocirc;ng ty S-cubism VietNam&nbsp;</p>
                <p>Phần giới thiệu về c&ocirc;ng ty S-cubism VietNam&nbsp;Phần giới thiệu về c&ocirc;ng ty S-cubism VietNam&nbsp;Phần giới thiệu về c&ocirc;ng ty S-cubism VietNam&nbsp;</p>
            ',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
