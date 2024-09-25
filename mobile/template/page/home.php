  <!-- Account Balance -->
  <main id="main-route">
    <div class="main-content home">
      <section class="home__slider">
        <div class="swiper-container main-slider">
          <div class="swiper-wrapper">
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM tb_banner WHERE status = 'active' ");
            while ($data = mysqli_fetch_array($query)) {
              ?>
              <div class="swiper-slide">
                <a href="#">
                  <img src="../uploads/fotobanner/<?php echo $data['gambar'] ?>" class="img-fluid w-100">
                </a>
              </div>

              <?php
            }
            ?>
          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </section>
      <section class="home__jackpot">
        <div class="container">
          <div class="jackpot-gif">
            <div class="jackpot-amount">IDR <span id="amount"></span></div>
          </div>
        </div>
      </section>
      <section class="mobile__category">
        <div class="container">
          <div class="category-container">
            <a href="?page=popular">
              <div class="category-item">
                <div class="icon">
                  <img src="themes/default/img/mobile-home-icon/mobile-popular.svg" width="30" height="30" alt="popular">
                </div>
                <div class="name">Popular</div>
              </div>
            </a>


            <a href="?page=slot">
              <div class="category-item">
                <div class="icon">
                  <img src="themes/default/img/mobile-home-icon/mobile-slot.svg" width="30" height="30" alt="slot">
                </div>
                <div class="name">
                  Slot
                </div>
              </div>
            </a>

            <a href="?page=livegame">
              <div class="category-item">
                <img src="https://images.linkcdn.cloud/global/nav-addons/hot_category.png" width="30" height="12" style="position: absolute; z-index:9; animation: 0.25s ease 0s infinite alternate none running beat;">
                <div class="icon">
                  <img src="themes/default/img/mobile-home-icon/mobile-livegames.svg" width="30" height="30" alt="livegames">
                </div>
                <div class="name">
                  Live Game
                </div>
              </div>
            </a>

            <a href="?page=casino">
              <div class="category-item">
                <div class="icon">
                  <img src="themes/default/img/mobile-home-icon/mobile-casino.svg" width="30" height="30" alt="casino">
                </div>
                <div class="name">
                  Casino
                </div>
              </div>
            </a>

            <a href="?page=sport">
              <div class="category-item">
                <div class="icon">
                  <img src="themes/default/img/mobile-home-icon/mobile-sport.svg" width="30" height="30" alt="sport">
                </div>
                <div class="name">
                  Sportsbook
                </div>
              </div>
            </a>

            <a href="?page=lottery">
              <div class="category-item">
                <div class="icon">
                  <img src="themes/default/img/mobile-home-icon/mobile-lottery.svg" width="30" height="30" alt="lottery">
                </div>
                <div class="name">
                  Lottery
                </div>
              </div>
            </a>

            <a name="gamesPicker" data-menu="poker" href="?page=poker">
              <div class="category-item">
                <div class="icon">
                  <img src="themes/default/img/mobile-home-icon/mobile-poker.svg" width="30" height="30" alt="poker">
                </div>
                <div class="name">
                  Poker
                </div>
              </div>
            </a>

            <a href="?page=arcade">
              <div class="category-item">
                <div class="icon">
                  <img src="themes/default/img/mobile-home-icon/mobile-arcade.svg" width="30" height="30" alt="arcade">
                </div>
                <div class="name">
                  Arcade
                </div>
              </div>
            </a>


          </div>
        </div>
      </section>
      <section class="mobile__popular">
        <div class="container">
          <div class="popular-title">
            <i class="fab fa-hotjar"></i>
            <span>Game Terpopuler</span>
          </div>
        </div>
      </section>
      <section class="mobile__games">
        <div class="container">
          <div class="games-list">



            <?php
            $cuidTrigger = 1553;
            $id_provider = 'pragmatic';
            $user = $_SESSION['username'];
            $getUser = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$user'");
            $infouser = mysqli_fetch_array($getUser);
            $extplayer = $infouser['extplayer'];
            $id_member = $infouser['id_member'];
            $query = mysqli_query($koneksi, "SELECT * FROM game_lists WHERE provider = '$id_provider' ORDER BY id ASC LIMIT 9 ");

            while ($row = mysqli_fetch_array($query)) {
              if (isset($_SESSION['username'])) {
                if ($infouser['status_game'] == "ongame") {
                 $link_url = $urlweb . '/main/API/playGame.php?extplayer='.$id_member.'&gameCode='.$row['game_code'].'&provider='.$row['provider'];
               }else{
                $link_url = "?pesan=31";
              }

              ?>
              <div class="games-holder">
                <div class="games-img">
                  <a class="main sekarang main-sekarang-alert" href="<?php echo $link_url ?>">
                    <img src="<?php echo $row['images'] ?>" width="110" height="80" alt="S-RH02" loading="lazy">
                  </a>
                </div>
                <div class="games-name"><?php echo $row['name_game']; ?></div>
              </div>

              <?php
            } else { ?>
              <div class="games-holder">
                <div class="games-img">
                  <a class="main sekarang main-sekarang-alert" href="#" onclick=''>
                    <img src="<?php echo $row['images'] ?>" width="110" height="80" alt="S-RH02" loading="lazy">
                  </a>
                </div>
                <div class="games-name"><?php echo $row['name_game']; ?></div>
              </div>

            <?php }
          } ?>

        </div>
        <div class="games-button my-1 text-center">
          <a href="?page=popular" class="btn-custom-sm">Show More <i class="fas fa-arrow-alt-circle-right ml-1"></i></a>
        </div>
      </div>
    </section>
    <section class="mobile__download-bannner">
      <div class="container">
        <div class="mobile-download-container">
          <div class="download-icon">
            <img src="../assets/img/<?php echo $logo ?>" width="40" height="40" alt="android">
          </div>
          <div class="download-title">
            <h5><?php echo $judul; ?></h5>
            <h6>DOWNLOAD SEKARANG</h6>
          </div>
          <div class="download-button">
            <a class="btn-custom-sm" href="../uploads/apk/">Download</a>
          </div>
        </div>
      </div>
    </section>
    <section class="mobile__seo">
      <div class="container">
        <div class="game__seo">
          <div hidden id="title-seo"><?php echo $title; ?></div>
          <div class="seo-mobile showFooter">
            <div class="seo-content showFooter">
              <?php echo $judul ?> - Situs Slot Casino Online Gacor Server Thailand Terpercaya
              Selamat datang di dalam situs <?php echo $judul ?> dengan banyak permainan slot online dan casino terlengkap di dalamnya. Kami ingin mengenalkan tentang situs kami yang bisa gampang menang dan maxwin dengan sekali deposit saja. Website kami ini juga di dukung dengan support bank dan e wallet dana, kami juga menyediakan deposit via pulsa. Slot gacor hari ini dengan server thailand ini juga memiliki sistem keamanan data semua member kami. Jika ada kemenangan kalian bersama kami, silahkan ajak teman kalian untuk bermain bersama kami di website <?php echo $judul ?>.
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>