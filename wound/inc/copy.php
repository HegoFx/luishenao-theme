<?php
/**
 * All landing copy, per language. English is the client's approved text; Spanish is written for
 * Spanish-speaking patients in Florida (usted), not a literal translation. Never use "—" here.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function wt_copy() {
	$phone = '(786) 553-0770';

	$en = array(
		'lang'         => 'en',
		'skip'         => 'Skip to content',
		'switch_label' => 'Hablamos Español',
		'switch_title' => 'Ver esta página en español',
		'call'         => "Call $phone",
		'call_short'   => 'Call',
		'cta'          => 'Schedule a Wound Care Evaluation',
		'cta_short'    => 'Schedule',
		'hero'         => array(
			'eyebrow' => 'Advanced Wound Care · Orlando, FL',
			'title'   => array( 'Wound Care With', 'Advanced Recovery.' ),
			'scroll'  => 'Scroll to explore',
			'points'  => array( 'Advanced wound-care evaluation.', 'Physician-directed treatment planning.', 'Access to specialized recovery options.' ),
			'lead'    => 'Some wounds require more than conventional treatment alone. When healing becomes challenging, understanding your options is an important step toward receiving the care you need.',
			'note'    => 'Individual evaluation is required. HBOT is not appropriate for every wound or patient.',
			'spanish' => '¿Prefiere español? Hablamos español.',
		),
		'statement'    => 'Some wounds require *more than conventional treatment alone. When healing becomes challenging, *understanding *your *options is an important step toward receiving the care you need.',
		'status'       => array( 'open' => 'Office open', 'closed' => 'Office closed', 'closed_note' => 'Leave your details and we will call you.' ),
		'cursor'       => array( 'explore' => 'Explore', 'call' => 'Call', 'start' => 'Start' ),
		'zoom'         => 'Breathe',
		'spanish'      => array(
			'eyebrow' => 'Bilingual care',
			'title'   => 'Se habla español.',
			'text'    => 'Spanish-speaking patients and families receive the same care and attention, in their own language.',
			'link'    => 'Ver la página en español',
			'board'   => array( 'HABLAMOS ESPANOL', 'WE SPEAK ENGLISH', 'ORLANDO FLORIDA' ),
			'alt'     => 'A Hispanic family of three generations smiling together on a porch',
		),
		'location'     => array(
			'eyebrow' => 'Visit us',
			'title'   => 'Downtown Orlando.',
			'map'     => 'Get directions',
			'alt'     => 'Downtown Orlando and a lake at dusk',
		),
		'alts'         => array(
			'hero'    => 'A patient resting inside a clear hyperbaric oxygen chamber',
			'consult' => 'A physician listening to a patient and her daughter',
			'stages'  => array( 'A modern hyperbaric chamber suite', 'Illustration of oxygen reaching red blood cells', 'A nurse wrapping a clean bandage on a patient\'s leg' ),
			'conds'   => array( 'A physician examining a patient\'s bandaged foot', 'A patient recovering after surgery', 'A physician reviewing a foot x-ray', 'A patient walking with a physical therapist' ),
			'steps'   => array( 'A physician examining a patient\'s ankle', 'A physician explaining a treatment plan on a tablet', 'A care coordinator on the phone', 'A patient smiling during a follow-up visit' ),
			'final'   => 'A senior couple walking in a Florida park',
		),
		'illustrative' => 'Photos of patients and facilities are illustrative.',
		'doctor'       => array(
			'name'    => 'Fernando J. Torres, MD',
			'creds'   => 'CWSP, PCWC, WCC, DWC, CHWS, FACCWS',
			'role'    => 'Board-certified physician in advanced wound care and hyperbaric medicine.',
			'since'   => 'Practicing since 2005',
			'alt'     => 'Dr. Fernando J. Torres',
		),
		'program'      => array(
			'eyebrow' => 'Advanced Wound Care Recovery program',
			'title'   => 'Evaluation first. Specialized care when it is appropriate.',
			'flow'    => array( 'Evaluation with Dr. Torres', 'HBOT at a specialized facility', 'Ongoing follow-up with Dr. Torres' ),
			'body'    => array(
				'At Wound Therapeutics of Florida, Dr. Fernando J. Torres provides individualized wound-care evaluations and determines whether additional treatment options, including Hyperbaric Oxygen Therapy (HBOT), may be medically appropriate.',
				'Through an Advanced Wound Care Recovery program, patients for whom HBOT is recommended may receive treatment at a specialized facility while continuing their ongoing wound-care management and follow-up with Dr. Torres.',
			),
		),
		'hbot'         => array(
			'eyebrow' => 'About HBOT',
			'title'   => 'What Is Hyperbaric Oxygen Therapy?',
			'body'    => array(
				'Hyperbaric Oxygen Therapy (HBOT) is a medical treatment in which patients breathe 100% oxygen inside a specially pressurized chamber.',
				'Under these controlled conditions, the amount of oxygen dissolved in the blood increases, allowing oxygen to reach tissues through the circulation.',
				'For certain medical conditions, HBOT may be used alongside established wound-care treatments as part of a comprehensive clinical approach.',
			),
			'callout' => 'HBOT is not a replacement for standard wound care. It is an additional treatment option considered when a patient\'s diagnosis, wound characteristics, medical history, and treatment progress support its use.',
			'facts'   => array( '100% oxygen', 'Pressurized chamber', 'Alongside standard wound care' ),
			'air'     => 'Room air',
			'chamber' => 'Inside the chamber',
			'meter'   => 'Oxygen you breathe',
			'figure'  => 'Illustration: a patient breathes 100% oxygen inside a pressurized chamber.',
		),
		'when'         => array(
			'eyebrow' => 'Conditions',
			'title'   => 'When Might HBOT Be Considered?',
			'intro'   => 'Not every wound requires advanced hyperbaric oxygen therapy. However, certain complex wounds and medical conditions may warrant additional evaluation.',
			'items'   => array(
				array( 'icon' => 'foot', 'title' => 'Selected Diabetic Foot Ulcers', 'text' => 'Some severe diabetic foot ulcers that have not responded adequately to appropriate standard wound care may qualify for HBOT evaluation.' ),
				array( 'icon' => 'graft', 'title' => 'Compromised Grafts or Flaps', 'text' => 'When tissue viability is threatened following certain surgical procedures, HBOT may be considered in selected cases as an adjunct to appropriate surgical and medical management.' ),
				array( 'icon' => 'shield', 'title' => 'Certain Serious Infections', 'text' => 'HBOT may have a role in the management of specific serious infections, including selected cases of refractory osteomyelitis, as part of a broader treatment plan.' ),
				array( 'icon' => 'trauma', 'title' => 'Selected Traumatic Injuries', 'text' => 'Certain severe traumatic injuries involving compromised tissue viability may warrant specialized evaluation.' ),
			),
		),
		'check'        => array(
			'eyebrow' => 'Quick self-check',
			'title'   => 'Could an HBOT evaluation be worth asking about?',
			'intro'   => 'Mark what applies to you. This is not a diagnosis, and nothing you mark is sent anywhere.',
			'items'   => array(
				'I have a diabetic foot ulcer that has not improved with standard wound care.',
				'I had surgery and a graft or flap is not healing as expected.',
				'I have a serious infection, such as osteomyelitis, that keeps coming back.',
				'I had a severe injury and the tissue is struggling to heal.',
				'I would like a specialist\'s opinion on my wound treatment.',
			),
			'of'      => 'of',
			'none'    => 'Even if none apply, an evaluation can help you understand your treatment options.',
			'some'    => 'That is a good reason to schedule an evaluation. Only Dr. Torres can determine whether HBOT is medically appropriate for you.',
		),
		'marquee'      => array( 'Evaluation first', 'Physician-directed', 'Coordinated care', 'Ongoing follow-up' ),
		'eval'         => array(
			'title' => 'The Right Treatment Begins With the Right Evaluation.',
			'text'  => 'Dr. Torres reviews your wound, medical history, previous treatments, and overall clinical condition to determine which treatment options may be appropriate.',
			'cta'   => 'Request an Evaluation',
		),
		'steps'        => array(
			'eyebrow' => 'Your visit',
			'title'   => 'What to Expect From Your Evaluation',
			'items'   => array(
				array( 'title' => 'Comprehensive Wound Assessment', 'text' => 'Dr. Torres evaluates your wound, relevant medical history, current condition, and previous treatments.' ),
				array( 'title' => 'Individualized Treatment Recommendations', 'text' => 'Based on the clinical findings, he determines whether HBOT evaluation or other treatment approaches may be appropriate.' ),
				array( 'title' => 'Coordinated Access to Advanced Treatment', 'text' => 'When HBOT is recommended, Dr. Torres\'s team coordinates the next steps with the facility specialists who manage the on-site HBOT process.' ),
				array( 'title' => 'Ongoing Wound-Care Management', 'text' => 'Dr. Torres continues monitoring your wound, evaluating progress, and managing your ongoing wound-care treatment plan.' ),
			),
		),
		'personal'     => array(
			'title'  => 'Advanced Options. Personalized Care.',
			'body'   => array(
				'Every wound is different. Your treatment plan should reflect your individual medical needs, not a one-size-fits-all approach.',
				'Whether your care involves conventional wound management, advanced treatment technologies, or consideration of HBOT, the goal is to identify an appropriate pathway based on your clinical condition.',
			),
			'path'   => array( 'Conventional wound management', 'Advanced treatment technologies', 'Consideration of HBOT' ),
			'plan'   => 'Your treatment plan',
		),
		'final'        => array(
			'title'      => 'Find Out Whether HBOT May Be Appropriate for You.',
			'text'       => 'If you\'re dealing with a difficult-to-heal wound or would like to better understand your treatment options, schedule a wound-care evaluation with Dr. Torres.',
			'or_call'    => 'Prefer to talk now? Call us',
			'hours'      => 'Mon to Fri, 8:00 AM to 5:00 PM',
			'disclaimer' => 'Treatment recommendations depend on individual medical evaluation. HBOT eligibility, insurance coverage, and treatment authorization are determined separately and are not guaranteed.',
		),
		'form'         => array(
			'title'   => 'Request your evaluation',
			'name'    => 'Full name',
			'phone'   => 'Phone',
			'email'   => 'Email (optional)',
			'pref'    => 'Preferred language',
			'consent' => 'By submitting, you agree to be contacted by phone, text, or email about your request. Please do not include medical details in this form.',
			'submit'  => 'Request My Evaluation',
			'preview' => "This form is a preview and is not connected yet. To schedule now, call $phone.",
		),
		'footer'       => array(
			'tagline' => 'Advanced wound care and hyperbaric medicine serving Central Florida.',
			'visit'   => 'Visit woundfl.com',
			'rights'  => 'All rights reserved.',
		),
		'seo'          => array(
			'title' => 'HBOT & Advanced Wound Care Evaluation in Orlando, FL | Wound Therapeutics of Florida',
			'desc'  => 'Difficult-to-heal wound? Dr. Fernando J. Torres evaluates your case and determines whether Hyperbaric Oxygen Therapy (HBOT) may be appropriate. Orlando, FL. Hablamos español.',
		),
	);

	$es = array(
		'lang'         => 'es',
		'skip'         => 'Ir al contenido',
		'switch_label' => 'In English',
		'switch_title' => 'View this page in English',
		'call'         => "Llame al $phone",
		'call_short'   => 'Llamar',
		'cta'          => 'Agende una evaluación de su herida',
		'cta_short'    => 'Agendar',
		'hero'         => array(
			'eyebrow' => 'Cuidado avanzado de heridas · Orlando, FL',
			'title'   => array( 'Cuidado de heridas con', 'recuperación avanzada.' ),
			'scroll'  => 'Deslice para explorar',
			'points'  => array( 'Evaluación avanzada de heridas.', 'Plan de tratamiento dirigido por un médico.', 'Acceso a opciones especializadas de recuperación.' ),
			'lead'    => 'Algunas heridas necesitan más que el tratamiento convencional. Cuando la cicatrización se complica, conocer sus opciones es un paso importante para recibir la atención que necesita.',
			'note'    => 'Se requiere una evaluación individual. La HBOT no es adecuada para todas las heridas ni para todos los pacientes.',
			'spanish' => '',
		),
		'statement'    => 'Algunas heridas necesitan *más que el tratamiento convencional. Cuando la cicatrización se complica, *conocer *sus *opciones es un paso importante para recibir la atención que necesita.',
		'status'       => array( 'open' => 'Consultorio abierto', 'closed' => 'Consultorio cerrado', 'closed_note' => 'Déjenos sus datos y lo llamamos.' ),
		'cursor'       => array( 'explore' => 'Ver', 'call' => 'Llamar', 'start' => 'Empezar' ),
		'zoom'         => 'Respire',
		'spanish'      => array(
			'eyebrow' => 'Atención bilingüe',
			'title'   => 'En su idioma.',
			'text'    => 'Atendemos a pacientes hispanohablantes y a sus familias con la misma dedicación, en español.',
			'link'    => 'View this page in English',
			'board'   => array( 'HABLAMOS ESPANOL', 'WE SPEAK ENGLISH', 'ORLANDO FLORIDA' ),
			'alt'     => 'Una familia hispana de tres generaciones sonriendo en un porche',
		),
		'location'     => array(
			'eyebrow' => 'Visítenos',
			'title'   => 'En el centro de Orlando.',
			'map'     => 'Cómo llegar',
			'alt'     => 'El centro de Orlando y un lago al anochecer',
		),
		'alts'         => array(
			'hero'    => 'Un paciente descansando dentro de una cámara de oxígeno hiperbárico transparente',
			'consult' => 'Un médico escuchando a una paciente y a su hija',
			'stages'  => array( 'Una sala moderna de cámara hiperbárica', 'Ilustración del oxígeno llegando a los glóbulos rojos', 'Una enfermera colocando un vendaje limpio en la pierna de un paciente' ),
			'conds'   => array( 'Un médico examinando el pie vendado de un paciente', 'Una paciente recuperándose después de una cirugía', 'Un médico revisando una radiografía del pie', 'Un paciente caminando con un fisioterapeuta' ),
			'steps'   => array( 'Un médico examinando el tobillo de un paciente', 'Un médico explicando un plan de tratamiento en una tableta', 'Una coordinadora de atención al teléfono', 'Una paciente sonriendo en una cita de seguimiento' ),
			'final'   => 'Una pareja mayor caminando en un parque de Florida',
		),
		'illustrative' => 'Las fotos de pacientes e instalaciones son ilustrativas.',
		'doctor'       => array(
			'name'    => 'Dr. Fernando J. Torres',
			'creds'   => 'CWSP, PCWC, WCC, DWC, CHWS, FACCWS',
			'role'    => 'Médico certificado en cuidado avanzado de heridas y medicina hiperbárica.',
			'since'   => 'Ejerce desde 2005',
			'alt'     => 'Dr. Fernando J. Torres',
		),
		'program'      => array(
			'eyebrow' => 'Programa de Recuperación Avanzada de Heridas',
			'title'   => 'Primero la evaluación. Atención especializada cuando es apropiada.',
			'flow'    => array( 'Evaluación con el Dr. Torres', 'HBOT en un centro especializado', 'Seguimiento continuo con el Dr. Torres' ),
			'body'    => array(
				'En Wound Therapeutics of Florida, el Dr. Fernando J. Torres realiza evaluaciones individualizadas de heridas y determina si otras opciones de tratamiento, como la oxigenoterapia hiperbárica (HBOT), pueden ser médicamente adecuadas.',
				'A través del programa de Recuperación Avanzada de Heridas (Advanced Wound Care Recovery), los pacientes a quienes se les recomienda HBOT pueden recibir el tratamiento en un centro especializado, mientras continúan el manejo de su herida y su seguimiento con el Dr. Torres.',
			),
		),
		'hbot'         => array(
			'eyebrow' => 'Sobre la HBOT',
			'title'   => '¿Qué es la oxigenoterapia hiperbárica?',
			'body'    => array(
				'La oxigenoterapia hiperbárica (HBOT, por sus siglas en inglés) es un tratamiento médico en el que el paciente respira oxígeno al 100% dentro de una cámara presurizada especialmente diseñada.',
				'En estas condiciones controladas aumenta la cantidad de oxígeno disuelto en la sangre, lo que permite que el oxígeno llegue a los tejidos a través de la circulación.',
				'En ciertas condiciones médicas, la HBOT puede usarse junto con los tratamientos de heridas ya establecidos, como parte de un enfoque clínico integral.',
			),
			'callout' => 'La HBOT no reemplaza el cuidado estándar de heridas. Es una opción adicional que se considera cuando el diagnóstico, las características de la herida, el historial médico y la evolución del tratamiento del paciente respaldan su uso.',
			'facts'   => array( 'Oxígeno al 100%', 'Cámara presurizada', 'Junto al cuidado estándar' ),
			'air'     => 'Aire normal',
			'chamber' => 'Dentro de la cámara',
			'meter'   => 'Oxígeno que respira',
			'figure'  => 'Ilustración: el paciente respira oxígeno al 100% dentro de una cámara presurizada.',
		),
		'when'         => array(
			'eyebrow' => 'Condiciones',
			'title'   => '¿Cuándo se puede considerar la HBOT?',
			'intro'   => 'No todas las heridas requieren oxigenoterapia hiperbárica. Sin embargo, algunas heridas complejas y ciertas condiciones médicas pueden justificar una evaluación adicional.',
			'items'   => array(
				array( 'icon' => 'foot', 'title' => 'Úlceras de pie diabético seleccionadas', 'text' => 'Algunas úlceras graves de pie diabético que no han respondido adecuadamente al cuidado estándar apropiado pueden calificar para una evaluación de HBOT.' ),
				array( 'icon' => 'graft', 'title' => 'Injertos o colgajos comprometidos', 'text' => 'Cuando la viabilidad del tejido está en riesgo después de ciertos procedimientos quirúrgicos, la HBOT puede considerarse en casos seleccionados como complemento del manejo quirúrgico y médico apropiado.' ),
				array( 'icon' => 'shield', 'title' => 'Ciertas infecciones graves', 'text' => 'La HBOT puede tener un papel en el manejo de algunas infecciones graves, incluidos casos seleccionados de osteomielitis refractaria, como parte de un plan de tratamiento más amplio.' ),
				array( 'icon' => 'trauma', 'title' => 'Lesiones traumáticas seleccionadas', 'text' => 'Algunas lesiones traumáticas graves que comprometen la viabilidad del tejido pueden justificar una evaluación especializada.' ),
			),
		),
		'check'        => array(
			'eyebrow' => 'Autoevaluación rápida',
			'title'   => '¿Vale la pena preguntar por una evaluación de HBOT?',
			'intro'   => 'Marque lo que aplica a su caso. No es un diagnóstico y nada de lo que marque se envía a ninguna parte.',
			'items'   => array(
				'Tengo una úlcera de pie diabético que no ha mejorado con el cuidado estándar.',
				'Me operaron y un injerto o colgajo no está sanando como se esperaba.',
				'Tengo una infección grave, como osteomielitis, que vuelve a aparecer.',
				'Tuve una lesión grave y el tejido no termina de sanar.',
				'Quisiera la opinión de un especialista sobre el tratamiento de mi herida.',
			),
			'of'      => 'de',
			'none'    => 'Aunque ninguna aplique, una evaluación puede ayudarle a entender sus opciones de tratamiento.',
			'some'    => 'Es una buena razón para agendar una evaluación. Solo el Dr. Torres puede determinar si la HBOT es médicamente adecuada para usted.',
		),
		'marquee'      => array( 'Primero la evaluación', 'Dirigido por un médico', 'Atención coordinada', 'Seguimiento continuo' ),
		'eval'         => array(
			'title' => 'El tratamiento correcto empieza con la evaluación correcta.',
			'text'  => 'El Dr. Torres revisa su herida, su historial médico, los tratamientos previos y su condición clínica general para determinar qué opciones de tratamiento pueden ser adecuadas.',
			'cta'   => 'Solicite una evaluación',
		),
		'steps'        => array(
			'eyebrow' => 'Su consulta',
			'title'   => 'Qué esperar de su evaluación',
			'items'   => array(
				array( 'title' => 'Evaluación completa de la herida', 'text' => 'El Dr. Torres evalúa su herida, su historial médico relevante, su condición actual y los tratamientos previos.' ),
				array( 'title' => 'Recomendaciones de tratamiento individualizadas', 'text' => 'Según los hallazgos clínicos, determina si conviene evaluar la HBOT u otros enfoques de tratamiento.' ),
				array( 'title' => 'Acceso coordinado a tratamiento avanzado', 'text' => 'Cuando se recomienda HBOT, el equipo del Dr. Torres coordina los siguientes pasos con los especialistas del centro que manejan el proceso de HBOT en sus instalaciones.' ),
				array( 'title' => 'Manejo continuo de la herida', 'text' => 'El Dr. Torres sigue monitoreando su herida, evalúa su progreso y maneja su plan de tratamiento.' ),
			),
		),
		'personal'     => array(
			'title' => 'Opciones avanzadas. Atención personalizada.',
			'body'  => array(
				'Cada herida es diferente. Su plan de tratamiento debe responder a sus necesidades médicas individuales, no a un enfoque igual para todos.',
				'Ya sea que su atención incluya el manejo convencional de heridas, tecnologías de tratamiento avanzadas o la consideración de la HBOT, el objetivo es encontrar el camino adecuado según su condición clínica.',
			),
			'path'  => array( 'Manejo convencional de heridas', 'Tecnologías de tratamiento avanzadas', 'Consideración de la HBOT' ),
			'plan'  => 'Su plan de tratamiento',
		),
		'final'        => array(
			'title'      => 'Averigüe si la HBOT puede ser adecuada para usted.',
			'text'       => 'Si tiene una herida que no sana o quiere entender mejor sus opciones de tratamiento, agende una evaluación con el Dr. Torres.',
			'or_call'    => '¿Prefiere hablar ahora? Llámenos',
			'hours'      => 'Lunes a viernes, 8:00 a. m. a 5:00 p. m.',
			'disclaimer' => 'Las recomendaciones de tratamiento dependen de una evaluación médica individual. La elegibilidad para HBOT, la cobertura del seguro y la autorización del tratamiento se determinan por separado y no están garantizadas.',
		),
		'form'         => array(
			'title'   => 'Solicite su evaluación',
			'name'    => 'Nombre completo',
			'phone'   => 'Teléfono',
			'email'   => 'Correo electrónico (opcional)',
			'pref'    => 'Idioma preferido',
			'consent' => 'Al enviar, acepta que lo contactemos por teléfono, mensaje de texto o correo electrónico sobre su solicitud. Por favor, no incluya detalles médicos en este formulario.',
			'submit'  => 'Solicitar mi evaluación',
			'preview' => "Este formulario es una vista previa y aún no está conectado. Para agendar ahora, llame al $phone.",
		),
		'footer'       => array(
			'tagline' => 'Cuidado avanzado de heridas y medicina hiperbárica en el centro de Florida.',
			'visit'   => 'Visite woundfl.com',
			'rights'  => 'Todos los derechos reservados.',
		),
		'seo'          => array(
			'title' => 'Evaluación de heridas y HBOT en Orlando, FL | Wound Therapeutics of Florida',
			'desc'  => '¿Una herida que no sana? El Dr. Fernando J. Torres evalúa su caso y determina si la oxigenoterapia hiperbárica (HBOT) puede ser adecuada para usted. Orlando, FL. Atención en español.',
		),
	);

	return 'es' === wt_lang() ? $es : $en;
}

/**
 * Business facts shared by both languages.
 */
function wt_biz() {
	return array(
		'name'      => 'Wound Therapeutics of Florida',
		'phone'     => '(786) 553-0770',
		'tel'       => '+17865530770',
		'fax'       => '(321) 396-0070',
		'email'     => 'info@woundfl.com',
		'street'    => '100 W Gore St Suite 302',
		'city'      => 'Orlando',
		'region'    => 'FL',
		'zip'       => '32806',
		'site'      => 'https://woundfl.com',
		'maps'      => 'https://www.google.com/maps/search/?api=1&query=100+W+Gore+St+Suite+302%2C+Orlando%2C+FL+32806',
		'tz'        => 'America/New_York',
		'physician' => 'Fernando J. Torres, MD',
	);
}
