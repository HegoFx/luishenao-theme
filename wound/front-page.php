<?php
/**
 * The HBOT landing. Copy lives in inc/copy.php (English and Spanish).
 */

get_header();
$c = wt_copy();
$b = wt_biz();
$tel = 'tel:' . $b['tel'];
?>
<main id="main">

	<section class="wt-hero">
		<div class="wt-wrap wt-hero__in">
			<div class="wt-hero__copy">
				<p class="wt-eyebrow"><?php echo esc_html( $c['hero']['eyebrow'] ); ?></p>
				<h1><?php echo esc_html( $c['hero']['title'] ); ?></h1>
				<ul class="wt-checks">
					<?php foreach ( $c['hero']['points'] as $p ) : ?>
						<li><?php echo wt_icon( 'check' ); ?><?php echo esc_html( $p ); ?></li>
					<?php endforeach; ?>
				</ul>
				<p class="wt-lead"><?php echo esc_html( $c['hero']['lead'] ); ?></p>
				<div class="wt-actions">
					<a class="wt-btn wt-btn--lg" href="#evaluation"><?php echo esc_html( $c['cta'] ); ?><?php echo wt_icon( 'arrow' ); ?></a>
					<a class="wt-btn wt-btn--ghost wt-btn--lg" href="<?php echo esc_attr( $tel ); ?>"><?php echo wt_icon( 'phone' ); ?><?php echo esc_html( $c['call'] ); ?></a>
				</div>
				<p class="wt-note"><?php echo esc_html( $c['hero']['note'] ); ?></p>
				<?php if ( $c['hero']['spanish'] ) : ?>
					<p class="wt-es"><a href="<?php echo esc_url( wt_other_url() ); ?>" hreflang="es" lang="es"><?php echo esc_html( $c['hero']['spanish'] ); ?> <?php echo wt_icon( 'arrow' ); ?></a></p>
				<?php endif; ?>
			</div>
			<figure class="wt-doc">
				<img src="<?php echo wt_img( 'dr-torres.webp' ); ?>" alt="<?php echo esc_attr( $c['doctor']['alt'] ); ?>" width="768" height="1024" fetchpriority="high">
				<figcaption class="wt-doc__card">
					<strong><?php echo esc_html( $c['doctor']['name'] ); ?></strong>
					<span class="wt-doc__creds"><?php echo esc_html( $c['doctor']['creds'] ); ?></span>
					<span><?php echo esc_html( $c['doctor']['role'] ); ?></span>
					<span class="wt-doc__since"><?php echo esc_html( $c['doctor']['since'] ); ?></span>
				</figcaption>
			</figure>
		</div>
	</section>

	<section class="wt-section wt-program">
		<div class="wt-wrap wt-split">
			<div>
				<p class="wt-eyebrow"><?php echo esc_html( $c['program']['eyebrow'] ); ?></p>
				<h2><?php echo esc_html( $c['program']['title'] ); ?></h2>
			</div>
			<div class="wt-prose">
				<?php foreach ( $c['program']['body'] as $p ) : ?>
					<p><?php echo esc_html( $p ); ?></p>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="wt-section wt-hbot" id="hbot">
		<div class="wt-wrap wt-split wt-split--media">
			<div>
				<p class="wt-eyebrow"><?php echo esc_html( $c['hbot']['eyebrow'] ); ?></p>
				<h2><?php echo esc_html( $c['hbot']['title'] ); ?></h2>
				<div class="wt-prose">
					<?php foreach ( $c['hbot']['body'] as $p ) : ?>
						<p><?php echo esc_html( $p ); ?></p>
					<?php endforeach; ?>
				</div>
				<p class="wt-callout"><?php echo esc_html( $c['hbot']['callout'] ); ?></p>
			</div>
			<figure class="wt-chamber" aria-label="<?php echo esc_attr( $c['hbot']['figure'] ); ?>">
				<svg viewBox="0 0 480 300" role="img" aria-hidden="true">
					<defs>
						<linearGradient id="wtGlass" x1="0" y1="0" x2="0" y2="1">
							<stop offset="0" stop-color="#ffffff" stop-opacity=".95"/>
							<stop offset="1" stop-color="#dbe7f5" stop-opacity=".9"/>
						</linearGradient>
					</defs>
					<rect x="40" y="80" width="400" height="140" rx="70" fill="url(#wtGlass)" stroke="#0F1729" stroke-width="3"/>
					<rect x="40" y="80" width="400" height="140" rx="70" fill="none" stroke="#fff" stroke-width="10" opacity=".35"/>
					<path d="M110 80v140M370 80v140" stroke="#0F1729" stroke-width="3" opacity=".25"/>
					<rect x="30" y="226" width="420" height="10" rx="5" fill="#0F1729" opacity=".12"/>
					<g class="wt-bubbles" fill="#D33131">
						<circle cx="150" cy="150" r="5"/><circle cx="190" cy="125" r="3.5"/><circle cx="225" cy="170" r="4.5"/>
						<circle cx="265" cy="135" r="3"/><circle cx="300" cy="165" r="5.5"/><circle cx="335" cy="128" r="3.5"/>
						<circle cx="240" cy="110" r="2.5"/><circle cx="175" cy="182" r="3"/><circle cx="320" cy="190" r="2.5"/>
					</g>
					<text x="240" y="160" text-anchor="middle" class="wt-o2">O<tspan dy="8" font-size="22">2</tspan></text>
					<g fill="none" stroke="#0F1729" stroke-width="2" opacity=".35">
						<path d="M240 40v26M226 54l14 12 14-12"/>
						<path d="M240 260v-26M226 246l14-12 14 12"/>
					</g>
				</svg>
				<ul class="wt-facts">
					<?php foreach ( $c['hbot']['facts'] as $f ) : ?>
						<li><?php echo esc_html( $f ); ?></li>
					<?php endforeach; ?>
				</ul>
			</figure>
		</div>
	</section>

	<section class="wt-section wt-when">
		<div class="wt-wrap">
			<div class="wt-head">
				<p class="wt-eyebrow"><?php echo esc_html( $c['when']['eyebrow'] ); ?></p>
				<h2><?php echo esc_html( $c['when']['title'] ); ?></h2>
				<p class="wt-lead"><?php echo esc_html( $c['when']['intro'] ); ?></p>
			</div>
			<div class="wt-cards">
				<?php foreach ( $c['when']['items'] as $item ) : ?>
					<article class="wt-card">
						<span class="wt-card__icon"><?php echo wt_icon( $item['icon'] ); ?></span>
						<h3><?php echo esc_html( $item['title'] ); ?></h3>
						<p><?php echo esc_html( $item['text'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="wt-band">
		<div class="wt-wrap wt-band__in">
			<div>
				<h2><?php echo esc_html( $c['eval']['title'] ); ?></h2>
				<p><?php echo esc_html( $c['eval']['text'] ); ?></p>
			</div>
			<a class="wt-btn wt-btn--lg wt-btn--light" href="#evaluation"><?php echo esc_html( $c['eval']['cta'] ); ?><?php echo wt_icon( 'arrow' ); ?></a>
		</div>
	</section>

	<section class="wt-section wt-steps-sec">
		<div class="wt-wrap">
			<div class="wt-head">
				<p class="wt-eyebrow"><?php echo esc_html( $c['steps']['eyebrow'] ); ?></p>
				<h2><?php echo esc_html( $c['steps']['title'] ); ?></h2>
			</div>
			<ol class="wt-steps">
				<?php foreach ( $c['steps']['items'] as $i => $s ) : ?>
					<li>
						<span class="wt-steps__n"><?php echo (int) $i + 1; ?></span>
						<h3><?php echo esc_html( $s['title'] ); ?></h3>
						<p><?php echo esc_html( $s['text'] ); ?></p>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</section>

	<section class="wt-section wt-personal">
		<div class="wt-wrap wt-split">
			<div>
				<h2><?php echo esc_html( $c['personal']['title'] ); ?></h2>
				<div class="wt-prose">
					<?php foreach ( $c['personal']['body'] as $p ) : ?>
						<p><?php echo esc_html( $p ); ?></p>
					<?php endforeach; ?>
				</div>
			</div>
			<ol class="wt-path">
				<?php foreach ( $c['personal']['path'] as $p ) : ?>
					<li><?php echo esc_html( $p ); ?></li>
				<?php endforeach; ?>
			</ol>
		</div>
	</section>

	<section class="wt-section wt-final" id="evaluation">
		<div class="wt-wrap wt-final__in">
			<div class="wt-final__copy">
				<h2><?php echo esc_html( $c['final']['title'] ); ?></h2>
				<p class="wt-lead"><?php echo esc_html( $c['final']['text'] ); ?></p>
				<div class="wt-callbox">
					<span><?php echo esc_html( $c['final']['or_call'] ); ?></span>
					<a href="<?php echo esc_attr( $tel ); ?>"><?php echo wt_icon( 'phone' ); ?><?php echo esc_html( $b['phone'] ); ?></a>
					<small><?php echo esc_html( $c['final']['hours'] ); ?></small>
				</div>
				<p class="wt-note"><?php echo esc_html( $c['final']['disclaimer'] ); ?></p>
			</div>
			<?php // Placeholder until the GoHighLevel form is ready: replace this <form> with its embed. ?>
			<form class="wt-form" id="wt-form" novalidate>
				<h3><?php echo esc_html( $c['form']['title'] ); ?></h3>
				<label><span><?php echo esc_html( $c['form']['name'] ); ?></span><input name="name" autocomplete="name" required></label>
				<label><span><?php echo esc_html( $c['form']['phone'] ); ?></span><input name="phone" type="tel" autocomplete="tel" required></label>
				<label><span><?php echo esc_html( $c['form']['email'] ); ?></span><input name="email" type="email" autocomplete="email"></label>
				<fieldset>
					<legend><?php echo esc_html( $c['form']['pref'] ); ?></legend>
					<label class="wt-radio"><input type="radio" name="language" value="en" <?php checked( 'en', $c['lang'] ); ?>> English</label>
					<label class="wt-radio"><input type="radio" name="language" value="es" <?php checked( 'es', $c['lang'] ); ?>> Español</label>
				</fieldset>
				<p class="wt-form__consent"><?php echo esc_html( $c['form']['consent'] ); ?></p>
				<button class="wt-btn wt-btn--lg" type="submit"><?php echo esc_html( $c['form']['submit'] ); ?></button>
				<p class="wt-form__msg" role="status" hidden><?php echo esc_html( $c['form']['preview'] ); ?></p>
			</form>
		</div>
	</section>

</main>
<?php
get_footer();
