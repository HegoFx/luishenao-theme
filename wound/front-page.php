<?php
/**
 * The HBOT landing. Copy lives in inc/copy.php (English and Spanish).
 * Every scene reads fine without JavaScript; assets/js/landing.js adds the motion on top.
 */

get_header();
$c   = wt_copy();
$b   = wt_biz();
$tel = 'tel:' . $b['tel'];

// Words wrapped one by one for the reveal and fill animations; a leading * marks a highlighted word.
$words = function ( $text, $class = 'wt-w' ) {
	return implode( ' ', array_map( function ( $w ) use ( $class ) {
		$hl = str_starts_with( $w, '*' );
		return '<span class="' . $class . ( $hl ? ' is-hl' : '' ) . '">' . esc_html( ltrim( $w, '*' ) ) . '</span>';
	}, explode( ' ', $text ) ) );
};
// Background video (Pexels): poster first, the file only loads near the viewport (landing.js).
$vid = function ( $name ) {
	$sm = is_file( get_theme_file_path( "assets/video/$name-sm.mp4" ) ) ? sprintf( ' data-src-sm="%s"', esc_url( get_theme_file_uri( "assets/video/$name-sm.mp4" ) ) ) : '';
	return sprintf( '<video muted loop playsinline preload="none" poster="%s" data-src="%s"%s></video>', wt_img( "$name-poster.webp" ), esc_url( get_theme_file_uri( "assets/video/$name.mp4" ) ), $sm );
};
// A responsive theme image with explicit size (no layout shift).
$pic = function ( $file, $alt, $w, $h, $attrs = '' ) {
	return sprintf( '<img src="%s" alt="%s" width="%d" height="%d" loading="lazy" decoding="async"%s>', wt_img( $file ), esc_attr( $alt ), $w, $h, $attrs ? ' ' . $attrs : '' );
};
?>
<main id="main">

	<section class="wt-hero wt-dark" data-header="dark">
		<div class="wt-hero__media" aria-hidden="true">
			<img src="<?php echo wt_img( 'hero-chamber.webp' ); ?>" alt="" width="1920" height="1088" fetchpriority="high">
		</div>
		<canvas class="wt-o2" aria-hidden="true"></canvas>
		<div class="wt-wrap wt-hero__in">
			<div class="wt-hero__copy">
				<p class="wt-status" data-rise data-status data-open="<?php echo esc_attr( $c['status']['open'] ); ?>" data-closed="<?php echo esc_attr( $c['status']['closed'] ); ?>" data-tz="<?php echo esc_attr( $b['tz'] ); ?>" data-lang="<?php echo esc_attr( $c['lang'] ); ?>" data-suffix="Orlando, FL">
					<span class="wt-dot"></span><span class="wt-status__t"><?php echo esc_html( $c['hero']['eyebrow'] ); ?></span>
				</p>
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
					<a class="wt-btn wt-btn--lg" href="#evaluation" data-magnetic data-cur="<?php echo esc_attr( $c['cursor']['start'] ); ?>"><?php echo esc_html( $c['cta'] ); ?><?php echo wt_icon( 'arrow' ); ?></a>
					<a class="wt-btn wt-btn--glass wt-btn--lg" href="<?php echo esc_attr( $tel ); ?>" data-cur="<?php echo esc_attr( $c['cursor']['call'] ); ?>"><?php echo wt_icon( 'phone' ); ?><?php echo esc_html( $c['call'] ); ?></a>
				</div>
				<p class="wt-note" data-rise><?php echo esc_html( $c['hero']['note'] ); ?></p>
				<?php if ( $c['hero']['spanish'] ) : ?>
					<p class="wt-es" data-rise><a href="<?php echo esc_url( wt_other_url() ); ?>" hreflang="es" lang="es"><?php echo esc_html( $c['hero']['spanish'] ); ?> <?php echo wt_icon( 'arrow' ); ?></a></p>
				<?php endif; ?>
			</div>
			<figure class="wt-doc" data-rise>
				<img src="<?php echo wt_img( 'dr-torres.webp' ); ?>" alt="<?php echo esc_attr( $c['doctor']['alt'] ); ?>" width="768" height="1024">
				<figcaption>
					<strong><?php echo esc_html( $c['doctor']['name'] ); ?></strong>
					<span class="wt-doc__creds"><?php echo esc_html( $c['doctor']['creds'] ); ?></span>
					<span><?php echo esc_html( $c['doctor']['role'] ); ?></span>
					<span class="wt-doc__since"><?php echo esc_html( $c['doctor']['since'] ); ?></span>
				</figcaption>
			</figure>
		</div>
		<a class="wt-scrollhint" href="#statement"><span><?php echo esc_html( $c['hero']['scroll'] ); ?></span><i aria-hidden="true"></i></a>
	</section>

	<section class="wt-statement" id="statement">
		<div class="wt-wrap">
			<p class="wt-statement__text"><?php echo $words( $c['statement'] ); // phpcs:ignore ?></p>
		</div>
	</section>

	<section class="wt-program">
		<div class="wt-program__media" data-io>
			<?php echo $pic( 'consult.webp', $c['alts']['consult'], 1216, 1520 ); // phpcs:ignore ?>
		</div>
		<div class="wt-program__copy">
			<p class="wt-eyebrow"><span class="wt-dot"></span><?php echo esc_html( $c['program']['eyebrow'] ); ?></p>
			<h2 data-reveal><?php echo esc_html( $c['program']['title'] ); ?></h2>
			<div class="wt-prose" data-reveal>
				<?php foreach ( $c['program']['body'] as $p ) : ?>
					<p><?php echo esc_html( $p ); ?></p>
				<?php endforeach; ?>
			</div>
			<ol class="wt-flow">
				<?php foreach ( $c['program']['flow'] as $i => $f ) : ?>
					<li class="<?php echo 1 === $i ? 'is-hbot' : ''; ?>"><span><?php echo 1 === $i ? 'O₂' : (int) $i + 1; ?></span><?php echo esc_html( $f ); ?></li>
				<?php endforeach; ?>
			</ol>
		</div>
	</section>

	<section class="wt-zoom wt-dark" aria-hidden="true">
		<div class="wt-zoom__pin">
			<div class="wt-zoom__media"><?php echo $vid( 'bubbles' ); // phpcs:ignore ?></div>
			<canvas class="wt-zoom__mask"></canvas>
			<p class="wt-zoom__word"><?php echo esc_html( $c['zoom'] ); ?></p>
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
					<div class="wt-slider" aria-hidden="true"><i></i><span><?php echo esc_html( $c['hbot']['facts'][0] ); ?></span><span><?php echo esc_html( $c['hbot']['facts'][2] ); ?></span></div>
				</div>
				<div class="wt-hbot__visual">
					<div class="wt-hbot__imgs">
						<?php foreach ( array( 'chamber-room', 'o2-cells', 'dressing' ) as $i => $f ) : ?>
							<?php echo $pic( "$f.webp", $c['alts']['stages'][ $i ], 896, 1120, 0 === $i ? 'class="is-on"' : '' ); // phpcs:ignore ?>
						<?php endforeach; ?>
					</div>
					<div class="wt-meter" role="img" aria-label="<?php echo esc_attr( $c['hbot']['figure'] ); ?>">
						<div class="wt-meter__orb" aria-hidden="true">
							<div class="wt-meter__fill"></div>
							<div class="wt-meter__value"><span data-o2>100</span><small>%</small></div>
							<div class="wt-meter__label" data-o2-label data-air="<?php echo esc_attr( $c['hbot']['air'] ); ?>" data-chamber="<?php echo esc_attr( $c['hbot']['chamber'] ); ?>"><?php echo esc_html( $c['hbot']['chamber'] ); ?></div>
						</div>
						<p class="wt-meter__caption"><?php echo esc_html( $c['hbot']['meter'] ); ?></p>
					</div>
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
					<p class="wt-when__count" aria-hidden="true"><b data-when-count>01</b> / 0<?php echo count( $c['when']['items'] ); ?></p>
				</div>
				<?php foreach ( $c['when']['items'] as $i => $item ) : ?>
					<article class="wt-cond" data-cur="<?php echo esc_attr( $c['cursor']['explore'] ); ?>">
						<div class="wt-cond__media">
							<?php echo $pic( 'cond-' . array( 'foot', 'graft', 'xray', 'rehab' )[ $i ] . '.webp', $c['alts']['conds'][ $i ], 1152, 864 ); // phpcs:ignore ?>
							<span class="wt-cond__num" aria-hidden="true">0<?php echo (int) $i + 1; ?></span>
						</div>
						<div class="wt-cond__body">
							<span class="wt-cond__icon"><?php echo wt_icon( $item['icon'] ); ?></span>
							<h3><?php echo esc_html( $item['title'] ); ?></h3>
							<p><?php echo esc_html( $item['text'] ); ?></p>
							<a class="wt-cond__cta" href="#evaluation"><?php echo esc_html( $c['eval']['cta'] ); ?><?php echo wt_icon( 'arrow' ); ?></a>
						</div>
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
					<?php foreach ( $c['check']['items'] as $item ) : ?>
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

	<section class="wt-lang">
		<div class="wt-lang__media" data-io>
			<?php echo $pic( 'familia.webp', $c['spanish']['alt'], 896, 1120 ); // phpcs:ignore ?>
		</div>
		<div class="wt-lang__copy">
			<p class="wt-eyebrow"><span class="wt-dot"></span><?php echo esc_html( $c['spanish']['eyebrow'] ); ?></p>
			<div class="wt-board" data-board="<?php echo esc_attr( implode( '|', $c['spanish']['board'] ) ); ?>" aria-hidden="true"><?php echo esc_html( $c['spanish']['board'][0] ); ?></div>
			<h2 data-reveal lang="es"><?php echo esc_html( $c['spanish']['title'] ); ?></h2>
			<p class="wt-lead"><?php echo esc_html( $c['spanish']['text'] ); ?></p>
			<a class="wt-btn wt-btn--lg" href="<?php echo esc_url( 'en' === $c['lang'] ? wt_other_url() : '#evaluation' ); ?>" data-magnetic><?php echo esc_html( 'en' === $c['lang'] ? $c['spanish']['link'] : $c['cta'] ); ?><?php echo wt_icon( 'arrow' ); ?></a>
			<?php if ( 'es' === $c['lang'] ) : ?>
				<p class="wt-lang__alt"><a href="<?php echo esc_url( wt_other_url() ); ?>" hreflang="en" lang="en"><?php echo esc_html( $c['spanish']['link'] ); ?></a></p>
			<?php endif; ?>
		</div>
	</section>

	<section class="wt-band wt-dark" data-header="dark">
		<div class="wt-marquee" aria-hidden="true">
			<div class="wt-marquee__row">
				<?php for ( $r = 0; $r < 2; $r++ ) : ?>
					<span>
						<?php foreach ( $c['marquee'] as $m ) : ?>
							<b><?php echo esc_html( $m ); ?></b><i>✦</i>
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
		<div class="wt-wrap">
			<div class="wt-steps__head">
				<p class="wt-eyebrow"><span class="wt-dot"></span><?php echo esc_html( $c['steps']['eyebrow'] ); ?></p>
				<h2 data-reveal><?php echo esc_html( $c['steps']['title'] ); ?></h2>
			</div>
			<ol class="wt-steps">
				<?php foreach ( $c['steps']['items'] as $i => $s ) : ?>
					<li style="--i: <?php echo (int) $i; ?>">
						<div class="wt-steps__text">
							<span class="wt-steps__n">0<?php echo (int) $i + 1; ?></span>
							<h3><?php echo esc_html( $s['title'] ); ?></h3>
							<p><?php echo esc_html( $s['text'] ); ?></p>
						</div>
						<div class="wt-steps__media">
							<?php echo $pic( 'step-' . array( 'assess', 'plan', 'coord', 'follow' )[ $i ] . '.webp', $c['alts']['steps'][ $i ], 1216, 832 ); // phpcs:ignore ?>
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
			<div class="wt-paths">
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

	<section class="wt-place wt-dark" data-header="dark">
		<div class="wt-place__media" aria-hidden="true"><?php echo $pic( 'orlando.webp', '', 1920, 1088 ); // phpcs:ignore ?></div>
		<div class="wt-wrap">
			<div class="wt-place__card">
				<p class="wt-eyebrow"><span class="wt-dot"></span><?php echo esc_html( $c['location']['eyebrow'] ); ?></p>
				<h2><?php echo esc_html( $c['location']['title'] ); ?></h2>
				<address><?php echo esc_html( $b['street'] ); ?><br><?php echo esc_html( "{$b['city']}, {$b['region']} {$b['zip']}" ); ?></address>
				<p class="wt-place__status" hidden data-status data-open="<?php echo esc_attr( $c['status']['open'] ); ?>" data-closed="<?php echo esc_attr( $c['status']['closed'] ); ?>" data-note="<?php echo esc_attr( $c['status']['closed_note'] ); ?>" data-tz="<?php echo esc_attr( $b['tz'] ); ?>" data-lang="<?php echo esc_attr( $c['lang'] ); ?>"><span class="wt-dot"></span><span class="wt-status__t"></span></p>
				<p class="wt-place__hours"><?php echo esc_html( $c['final']['hours'] ); ?></p>
				<div class="wt-actions">
					<a class="wt-btn" href="<?php echo esc_url( $b['maps'] ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $c['location']['map'] ); ?><?php echo wt_icon( 'arrow' ); ?></a>
					<a class="wt-btn wt-btn--glass" href="<?php echo esc_attr( $tel ); ?>"><?php echo wt_icon( 'phone' ); ?><?php echo esc_html( $b['phone'] ); ?></a>
				</div>
			</div>
		</div>
	</section>

	<section class="wt-final wt-dark" id="evaluation" data-header="dark">
		<div class="wt-final__media" aria-hidden="true"><?php echo $vid( 'final' ); // phpcs:ignore ?></div>
		<canvas class="wt-o2" aria-hidden="true"></canvas>
		<div class="wt-wrap wt-final__in">
			<div class="wt-final__copy">
				<h2 class="wt-final__title"><?php echo $words( $c['final']['title'] ); // phpcs:ignore ?></h2>
				<p class="wt-lead"><?php echo esc_html( $c['final']['text'] ); ?></p>
				<div class="wt-callbox">
					<span><?php echo esc_html( $c['final']['or_call'] ); ?></span>
					<a href="<?php echo esc_attr( $tel ); ?>" data-cur="<?php echo esc_attr( $c['cursor']['call'] ); ?>"><?php echo wt_icon( 'phone' ); ?><?php echo esc_html( $b['phone'] ); ?></a>
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
<div class="wt-cursor" aria-hidden="true"><span></span></div>
<?php
get_footer();
