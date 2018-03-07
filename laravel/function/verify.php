    /**
     * 生成验证码
     */
    public function verify(Request $request)
    {
        $img = imagecreatetruecolor(84, 32);
        $imgcolor = imagecolorallocate($img, mt_rand(100, 200), mt_rand(100, 200), mt_rand(100, 200));
        imagefill($img, 0, 0, $imgcolor);
        $pixelcolor = imagecolorallocate($img, mt_rand(100, 200), mt_rand(100, 200), mt_rand(100, 200));
        for ($i = 0; $i < 200; $i++) {
            imagesetpixel($img, mt_rand(0, 124) - 1, mt_rand(0, 32) - 1, $pixelcolor);
        }
        $linecolor = imagecolorallocate($img, mt_rand(150, 250), mt_rand(150, 250), mt_rand(150, 250));
        for ($j = 0; $j < 5; $j++) {
            imageline($img, mt_rand(0, 124), mt_rand(0, 32), mt_rand(0, 124), mt_rand(0, 32), $linecolor);
        }
        $yzmcolor = imagecolorallocate($img, mt_rand(50, 100), mt_rand(50, 100), mt_rand(50, 100));
        $yz = 'abcdefghijklmnopqrstuvwxyz1234567890';
        $Verify = "";
        for ($i = 0; $i < 4; $i++) {
            $yzm = substr($yz, mt_rand(0, 34), 1);
            $Verify .= $yzm;
        }
        imagettftext($img, 18, 3, 15, 23, $yzmcolor, 'Layer/1.ttf', $Verify);
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/png');
        imagepng($img);
    }