<footer>
    <div class="footer__container">
        <div class="footer__content">
            <div class="footer__logo-block">
                <div class="footer__logo">
                    <img src="{{ asset('assets/footer/logo_scamber.png') }}" alt="Scamber" />
                    <h3 class="logo__text">Scamber</h3>
                </div>
                <a href="tel:+380688453517" class="footer__number">
                    +380 (68)-845-35-17
                </a>
            </div>
            <div class="footer__info-block">
                <h4 class="footer__info-title">Час роботи</h4>
                <div class="footer__info-item">
                    <p class="work-days">Понеділок - Субота:</p>
                    <p class="work-time">09:00 - 20:00</p>
                </div>
                <div class="footer__info-item">
                    <p class="work-days">Неділя:</p>
                    <p class="work-time">09:00 - 19:00</p>
                </div>
                <a href="https://www.google.com/maps/place/%D0%BF%D1%80%D0%BE%D1%81%D0%BF%D0%B5%D0%BA%D1%82+%D0%9C%D0%B8%D1%80%D1%83,+56,+%D0%A5%D0%BC%D0%B5%D0%BB%D1%8C%D0%BD%D0%B8%D1%86%D1%8C%D0%BA%D0%B8%D0%B9,+%D0%A5%D0%BC%D0%B5%D0%BB%D1%8C%D0%BD%D0%B8%D1%86%D1%8C%D0%BA%D0%B0+%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%8C,+29000/@49.4431108,26.9863188,17z/data=!3m1!4b1!4m6!3m5!1s0x4732070ffe4354e9:0xf12413fb091cdcb!8m2!3d49.4431073!4d26.9888937!16s%2Fg%2F11c3q43s4q?entry=ttu"
                    class="showroom-address">
                    м.Хмельницький, проспект Миру 56
                </a>
            </div>
            <div class="footer__links-block">
                <h3 class="links-block__title">Наші новини</h3>
                <form action="" class="footer__subscribe">
                    <input type="email" name="email" id="footer__email" placeholder="Введіть Ваш E-mail"
                        class="subscribe__email" />
                    <input type="submit" value="Підписатися" class="subscribe__submit" />
                </form>
                <div class="footer__links-social">
                    <a class="social__item">
                        <Image src={{ asset('assets/footer/insta_logo.png') }} alt="Inst:@scamber" />
                    </a>
                    <a class="social__item">
                        <Image src="{{ asset('assets/footer/facebook_logo.png') }}" alt="Facebook:@scamber" />
                    </a>
                    <a class="social__item">
                        <Image src="{{ asset('assets/footer/twitter_logo.png') }}" alt="Twitter:@scamber" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
