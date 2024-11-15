<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  body {
    background-color: #000;
  }

  .img1 {
    position: absolute;
    top: 100px;
    left: 100px;
    box-shadow: 1px 1px 20px yellow;
    transition: box-shadow 0.3s ease;
  }
  .img2 {
    position: absolute;
    top: 100px;
    left: 1000px;
    /* box-shadow: 1px 1px 20px yellow; */
    /* filter: drop-shadow(1px 1px 20px yellow); */
    filter: drop-shadow(1px 1px 20px yellow);
    transition: box-shadow 0.3s ease;
  }

</style>

<body>
  <div class="img1">
    <img src="../assets/images/bannertemp/ddd.png" alt="">
  </div>
  <div class="img2">
    <img src="../assets/images/bannertemp/ddd.png" alt="">
  </div>
</body>

</html>