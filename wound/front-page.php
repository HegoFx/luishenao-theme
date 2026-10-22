<?php
/**
 * The HBOT landing. Copy lives in inc/copy.php (English and Spanish).
 * Every scene reads fine without JavaScript; assets/js/landing.js adds the motion on top.
 */

get_header();
$c   = wt_copy();
$b   = wt_biz();
$tel = 'tel:' . $b['tel'];

// Words wrapped one by one, for the reveal and fill animations.
$words = function ( $text, $class = 'wt-w' ) {
	return implode( ' ', array_map( fn( $w ) => '<span class="' . $class . '">' . esc_html( $w ) . '</span>', explode( ' ', $text ) ) );
};
?>
<main id="main">

	<section class="wt-hero wt-dark" data-header="dark">
		<canvas class="wt-o2" aria-hidden="true"></canvas>
		<div class="wt-hero__glow" aria-hidden="true"></div>
		<div class="wt-wrap wt-hero__in">
			<div class="wt-hero__copy">
				<p class="wt-eyebrow" data-rise><span class="wt-dot"></span><?php echo esc_html( $c['hero']['eyebrow'] ); ?></p>
				<h1 class="wt-hero__title">
					<span class="wt-line"><?php echo $words( $c['hero']['title'][0] ); // phpcs:ignore ?></span>
					<span class="wt-line wt-accent"><?php echo $words( $c['hero']['title'][1] ); // phpcs:ignore ?></span>
				</h1>
				<ul class="wt-checks" data-rise>
					<?php foreach ( $c['hero']['points'] as $p ) : ?>
						<li><?php echo wt_icon( 'check' ); ?><?php echo esc_html( $p ); ?></li>
					<?php endforeach; ?>
				</ul>
				<div class="wt-actions" data-rise>
					<a class="wt-btn wt-btn--lg" href="#evaluation" data-magnetic><?php echo esc_html( $c['cta'] ); ?><?php echo wt_icon( 'arrow' ); ?></a>
					<a class="wt-btn wt-btn--glass wt-btn--lg" href="<?php echo esc_attr( $tel ); ?>"><?php echo wt_icon( 'phone' ); ?><?php echo esc_html( $c['call'] ); ?></a>
				</div>
				<p class="wt-note" data-rise><?php echo esc_html( $c['hero']['note'] ); ?></p>
				<?php if ( $c['hero']['spanish'] ) : ?>
					<p class="wt-es" data-rise><a href="<?php echo esc_url( wt_other_url() ); ?>" hreflang="es" lang="es"><?php echo esc_html( $c['hero']['spanish'] ); ?> <?php echo wt_icon( 'arrow' ); ?></a></p>
				<?php endif; ?>
			</div>
			<figure class="wt-doc" data-rise>
				<div class="wt-doc__frame">
					<img src="<?php echo wt_img( 'dr-torres.webp' ); ?>" alt="<?php echo esc_attr( $c['doctor']['alt'] ); ?>" width="768" height="1024" fetchpriority="high">
				</div>
				<figcaption class="wt-doc__card">
					<strong><?php echo esc_html( $c['doctor']['name'] ); ?></strong>
					<span class="wt-doc__creds"><?php echo esc_html( $c['doctor']['creds'] ); ?></span>
					<span><?php echo esc_html( $c['doctor']['role'] ); ?></span>
					<span class="wt-doc__since"><span class="wt-dot"></span><?php echo esc_html( $c['doctor']['since'] ); ?></span>
				</figcaption>
			</figure>
		</div>
		<a class="wt-scrollhint" href="#statement"><span><?php echo esc_html( $c['hero']['scroll'] ); ?></span><i aria-hidden="true"></i></a>
	</section>

	<section class="wt-statement" id="statement">
		<div class="wt-wrap">
			<p class="wt-statement__text" data-fill><?php echo $words( $c['statement'] ); // phpcs:ignore ?></p>
		</div>
	</section>

	<section class="wt-section wt-program">
		<div class="wt-wrap wt-split">
			<div class="wt-program__head">
				<p class="wt-eyebrow"><span class="wt-dot"></span><?php echo esc_html( $c['program']['eyebrow'] ); ?></p>
				<h2 data-reveal><?php echo esc_html( $c['program']['title'] ); ?></h2>
			</div>
			<div class="wt-prose" data-reveal>
				<?php foreach ( $c['program']['body'] as $p ) : ?>
					<p><?php echo esc_html( $p ); ?></p>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="wt-wrap">
			<ol class="wt-flow" data-flow>
				<?php foreach ( $c['program']['flow'] as $i => $f ) : ?>
					<li class="wt-flow__node<?php echo 1 === $i ? ' is-hbot' : ''; ?>">
						<span class="wt-flow__dot"><?php echo 1 === $i ? 'O₂' : (int) $i + 1; ?></span>
						<span class="wt-flow__label"><?php echo esc_html( $f ); ?></span>
					</li>
				<?php endforeach; ?>
				<li class="wt-flow__line" aria-hidden="true"><i></i></li>
			</ol>
		</div>
	</section>

	<section class="wt-hbot wt-dark" id="hbot" data-header="dark">
		<div class="wt-hbot__pin">
			<div class="wt-wrap wt-hbot__in">
				<div class="wt-hbot__copy">
					<p class="wt-eyebrow"><span class="wt-dot"></span><?php echo esc_html( $c['hbot']['eyebrow'] ); ?></p>
					<h2><?php echo esc_html( $c['hbot']['title'] ); ?></h2>
					<ol class="wt-stages">
						<?php foreach ( $c['hbot']['body'] as $i => $p ) : ?>
							<li class="wt-stage<?php echo 0 === $i ? ' is-on' : ''; ?>">
								<span class="wt-stage__n">0<?php echo (int) $i + 1; ?></span>
								<p><?php echo esc_html( $p ); ?></p>
							</li>
						<?php endforeach; ?>
					</ol>
				</div>
				<div class="wt-meter" aria-label="<?php echo esc_attr( $c['hbot']['figure'] ); ?>" role="img">
					<div class="wt-meter__rings" aria-hidden="true"><i></i><i></i><i></i></div>
					<div class="wt-meter__orb" aria-hidden="true">
						<div class="wt-meter__fill"></div>
						<div class="wt-meter__value"><span data-o2>100</span><small>%</small></div>
						<div class="wt-meter__label" data-o2-label data-air="<?php echo esc_attr( $c['hbot']['air'] ); ?>" data-chamber="<?php echo esc_attr( $c['hbot']['chamber'] ); ?>"><?php echo esc_html( $c['hbot']['chamber'] ); ?></div>
					</div>
					<p class="wt-meter__caption"><?php echo esc_html( $c['hbot']['meter'] ); ?></p>
					<ul class="wt-facts">
						<?php foreach ( $c['hbot']['facts'] as $f ) : ?>
							<li><?php echo esc_html( $f ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="wt-wrap">
			<p class="wt-callout" data-reveal><?php echo esc_html( $c['hbot']['callout'] ); ?></p>
		</div>
	</section>

	<section class="wt-when" data-header="light">
		<div class="wt-when__pin">
			<div class="wt-when__track">
				<div class="wt-when__intro">
					<p class="wt-eyebrow"><span class="wt-dot"></span><?php echo esc_html( $c['when']['eyebrow'] ); ?></p>
					<h2><?php echo esc_html( $c['when']['title'] ); ?></h2>
					<p class="wt-lead"><?php echo esc_html( $c['when']['intro'] ); ?></p>
					<span class="wt-when__drag" aria-hidden="true"><?php echo wt_icon( 'arrow' ); ?></span>
				</div>
				<?php foreach ( $c['when']['items'] as $i => $item ) : ?>
					<article class="wt-cond">
						<span class="wt-cond__num" aria-hidden="true">0<?php echo (int) $i + 1; ?></span>
						<span class="wt-cond__icon"><?php echo wt_icon( $item['icon'] ); ?></span>
						<h3><?php echo esc_html( $item['title'] ); ?></h3>
						<p><?php echo esc_html( $item['text'] ); ?></p>
						<a class="wt-cond__cta" href="#evaluation"><?php echo esc_html( $c['eval']['cta'] ); ?><?php echo wt_icon( 'arrow' ); ?></a>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="wt-when__bar" aria-hidden="true"><i></i></div>
	</section>

	<section class="wt-section wt-check" id="self-check">
		<div class="wt-wrap wt-split">
			<div class="wt-check__head">
				<p class="wt-eyebrow"><span class="wt-dot"></span><?php echo esc_html( $c['check']['eyebrow'] ); ?></p>
				<h2 data-reveal><?php echo esc_html( $c['check']['title'] ); ?></h2>
				<p class="wt-lead"><?php echo esc_html( $c['check']['intro'] ); ?></p>
				<div class="wt-check__count" aria-hidden="true"><b data-check-count>0</b><span><?php echo esc_html( $c['check']['of'] ); ?> <?php echo count( $c['check']['items'] ); ?></span></div>
			</div>
			<div class="wt-check__box">
				<ul class="wt-check__list">
					<?php foreach ( $c['check']['items'] as $i => $item ) : ?>
						<li><label><input type="checkbox" data-check><span class="wt-check__tick" aria-hidden="true"><?php echo wt_icon( 'check' ); ?></span><span><?php echo esc_html( $item ); ?></span></label></li>
					<?php endforeach; ?>
				</ul>
				<div class="wt-check__result" role="status" aria-live="polite" data-none="<?php echo esc_attr( $c['check']['none'] ); ?>" data-some="<?php echo esc_attr( $c['check']['some'] ); ?>">
					<p><?php echo esc_html( $c['check']['none'] ); ?></p>
					<a class="wt-btn" href="#evaluation" data-magnetic><?php echo esc_html( $c['cta'] ); ?><?php echo wt_icon( 'arrow' ); ?></a>
				</div>
			</div>
		</div>
	</section>

	<section class="wt-band wt-dark" data-header="dark">
		<div class="wt-marquee" aria-hidden="true">
			<div class="wt-marquee__row">
				<?php for ( $r = 0; $r < 2; $r++ ) : ?>
					<span>
						<?php foreach ( $c['marquee'] as $m ) : ?>
							<?php echo esc_html( $m ); ?><i>✦</i>
						<?php endforeach; ?>
					</span>
				<?php endfor; ?>
			</div>
		</div>
		<div class="wt-wrap wt-band__in">
			<div>
				<h2 data-reveal><?php echo esc_html( $c['eval']['title'] ); ?></h2>
				<p><?php echo esc_html( $c['eval']['text'] ); ?></p>
			</div>
			<a class="wt-btn wt-btn--lg wt-btn--light" href="#evaluation" data-magnetic><?php echo esc_html( $c['eval']['cta'] ); ?><?php echo wt_icon( 'arrow' ); ?></a>
		</div>
	</section>

	<section class="wt-section wt-steps-sec">
		<div class="wt-wrap wt-steps-grid">
			<div class="wt-steps__head">
				<p class="wt-eyebrow"><span class="wt-dot"></span><?php echo esc_html( $c['steps']['eyebrow'] ); ?></p>
				<h2 data-reveal><?php echo esc_html( $c['steps']['title'] ); ?></h2>
				<div class="wt-steps__progress" aria-hidden="true"><i></i></div>
			</div>
			<ol class="wt-steps">
				<?php foreach ( $c['steps']['items'] as $i => $s ) : ?>
					<li style="--i: <?php echo (int) $i; ?>">
						<span class="wt-steps__n">0<?php echo (int) $i + 1; ?></span>
						<div>
							<h3><?php echo esc_html( $s['title'] ); ?></h3>
							<p><?php echo esc_html( $s['text'] ); ?></p>
						</div>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</section>

	<section class="wt-section wt-personal">
		<div class="wt-wrap wt-split">
			<div>
				<h2 data-reveal><?php echo esc_html( $c['personal']['title'] ); ?></h2>
				<div class="wt-prose">
					<?php foreach ( $c['personal']['body'] as $p ) : ?>
						<p><?php echo esc_html( $p ); ?></p>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="wt-paths" data-paths>
				<ul>
					<?php foreach ( $c['personal']['path'] as $p ) : ?>
						<li><?php echo esc_html( $p ); ?></li>
					<?php endforeach; ?>
				</ul>
				<svg class="wt-paths__lines" viewBox="0 0 120 300" preserveAspectRatio="none" aria-hidden="true">
					<path d="M0 50 C 70 50, 60 150, 120 150"/>
					<path d="M0 150 L 120 150"/>
					<path d="M0 250 C 70 250, 60 150, 120 150"/>
				</svg>
				<div class="wt-paths__plan"><span class="wt-dot"></span><?php echo esc_html( $c['personal']['plan'] ); ?></div>
			</div>
		</div>
	</section>

	<section class="wt-final wt-dark" id="evaluation" data-header="dark">
		<canvas class="wt-o2" aria-hidden="true"></canvas>
		<div class="wt-wrap wt-final__in">
			<div class="wt-final__copy">
				<h2 class="wt-final__title"><?php echo $words( $c['final']['title'] ); // phpcs:ignore ?></h2>
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
