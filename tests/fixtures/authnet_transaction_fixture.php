<?php

class AuthnetTransactionFixture extends CakeTestFixture {
	public $name = 'AuthnetTransaction';

	public $fields = array(
		'amount' => array('type' => 'float','null' => true,'default' => 0),
		'card_number' => array('type' => 'string','length' => 16,'null' => true,'default' => NULL),
		'expiration' => array('type' => 'string','length' => 6,'null' => true,'default' => NULL),
		'ccv' => array('type' => 'string','length' => 4,'null' => true,'default' => NULL),
		'recurring' => array('type' => 'boolean','null' => true,'default' => 0),
		'transaction_id' => array('type' => 'string','null' => true,'default' => NULL),
		'authorization_code' => array('type' => 'string','null' => true,'default' => NULL),
		'invoice_id' => array('type' => 'string','length' => 20,'null' => true,'default' => NULL),
		'description' => array('type' => 'string','length' => 255,'null' => true,'default' => NULL),
		'line_items' => array('type' => 'text','null' => true,'default' => NULL),
		'billing_first_name' => array('type' => 'string','length' => 50,'null' => true,'default' => NULL),
		'billing_last_name' => array('type' => 'string','length' => 50,'null' => true,'default' => NULL),
		'billing_company' => array('type' => 'string','length' => 50,'null' => true,'default' => NULL),
		'billing_street' => array('type' => 'string','length' => 60,'null' => true,'default' => NULL),
		'billing_city' => array('type' => 'string','null' => true,'default' => NULL),
		'billing_state' => array('type' => 'string','null' => true,'default' => NULL),
		'billing_zip' => array('type' => 'string','null' => true,'default' => NULL),
		'billing_country' => array('type' => 'string','null' => true,'default' => NULL),
		'billing_phone' => array('type' => 'string','null' => true,'default' => NULL),
		'billing_fax' => array('type' => 'string','null' => true,'default' => NULL),
		'billing_email' => array('type' => 'string','null' => true,'default' => NULL),
		'customer_id' => array('type' => 'string','null' => true,'default' => NULL),
		'customer_ip' => array('type' => 'string','null' => true,'default' => NULL),
		'shipping_first_name' => array('type' => 'string','null' => true,'default' => NULL),
		'shipping_last_name' => array('type' => 'string','null' => true,'default' => NULL),
		'shipping_company' => array('type' => 'string','null' => true,'default' => NULL),
		'shipping_street' => array('type' => 'string','null' => true,'default' => NULL),
		'shipping_city' => array('type' => 'string','null' => true,'default' => NULL),
		'shipping_state' => array('type' => 'string','null' => true,'default' => NULL),
		'shipping_zip' => array('type' => 'string','null' => true,'default' => NULL),
		'shipping_country' => array('type' => 'string','null' => true,'default' => NULL),
		'taxes' => array('type' => 'text','null' => true,'default' => NULL),
		'freight' => array('type' => 'text','null' => true,'default' => NULL),
		'duty' => array('type' => 'text','null' => true,'default' => NULL),
		'purchase_order_id' => array('type' => 'string','length' => 25,'null' => true,'default' => NULL),
		'authentication_indicator' => array('type' => 'string','null' => true,'default' => NULL),
		'cardholder_authentication' => array('type' => '','null' => true,'default' => NULL),
		'other' => array('type' => 'text','null' => true,'default' => NULL),
		'test_mode' => array('type' => 'boolean','null' => true,'default' => 1)
	);

	public $records = array(
		array(
			'amount' => 7.01310430,
			'card_number' => 'arcu dapibus nam',
			'expiration' => 'tristi',
			'ccv' => 'dui ',
			'recurring' => 1,
			'transaction_id' => 'nunc iaculis ligula urna libero eget volutpat pharetra ornare metus a',
			'authorization_code' => 'maecenas nunc massa justo sem volutpat nam integer nunc nisi velit an',
			'invoice_id' => 'id ipsum nec massa e',
			'description' => 'risus tellus sed consequat mauris tristique fames ac rhoncus nibh accumsan lectus in luctus urna eros dui malesuada et dui nec nisi suspendisse nec a faucibus enim ipsum integer sed a euismod nibh donec tempor eleifend tristique consectetur maecenas sit a',
			'line_items' => 'aliquet vulputate placerat nisi magna sed nulla eget malesuada bibendum nunc et massa sodales et viverra congue mauris platea adipiscing est augue quam cras libero mi sed enim velit sit nisl tincidunt sodales nisi bibendum metus suspendisse risus varius placerat et consectetur consectetur arcu lacinia placerat ut quis ligula dictum convallis hac dolor vulputate ultrices in dictum vel at auctor in orci ac at facilisi metus at id consequat',
			'billing_first_name' => 'dictum massa dapibus eget gravida a convallis in m',
			'billing_last_name' => 'eget sed nec congue rutrum erat eleifend sem eget ',
			'billing_company' => 'risus dictumst odio luctus vel blandit gravida lac',
			'billing_street' => 'proin habitant quam risus risus mus pharetra rhoncus nisi ve',
			'billing_city' => 'maecenas viverra aliquam congue imperdiet turpis velitvestibulum pell',
			'billing_state' => 'odio augue nunc lectus sapien malesuada etiam nullam eleifend at pell',
			'billing_zip' => 'nullam at proin aliquam enim adipiscing viverra nisl dolor nunc liber',
			'billing_country' => 'purus tincidunt ultrices justo odio nunc gravida lorem nec elit hendr',
			'billing_phone' => 'in venenatis faucibus nisi nam in fusce ipsumut aenean tristique nec ',
			'billing_fax' => 'integer aliquam tempor ac venenatis interdum velit dignissim fringill',
			'billing_email' => 'laoreet ornare venenatis eros quam convallis ante maecenas in maecena',
			'customer_id' => 'etiam a placerat mauris dui pellentesque aliquam nunc aliquet pulvina',
			'customer_ip' => 'volutpat mattis nullam donec turpis feugiat vitae mauris sed nulla et',
			'shipping_first_name' => 'volutpat cras mauris quis tempor eros libero ipsum nisl tempor ut ull',
			'shipping_last_name' => 'tempor nunc enim hendrerit integer eget varius nunc habitasse ligula ',
			'shipping_company' => 'duis vitae quis vivamus eleifend nullam mauris curabitur arcu augue e',
			'shipping_street' => 'vel sem et integer nisl pulvinar laoreet habitasse ac at iaculis vest',
			'shipping_city' => 'adipiscing placerat a ante aliquet pulvinar proin nulla lorem fames i',
			'shipping_state' => 'venenatis ultrices elementum dictum aliquam faucibus sodales metus ne',
			'shipping_zip' => 'in bibendum imperdiet posuere tristique et a hac mauris lacus mauris ',
			'shipping_country' => 'dapibus fringilla in leo in ipsum velit mi sapien dui bibendum a ligu',
			'taxes' => 'massa morbi vitae a nascetur ac quis porta tristique quis ligula mollis iaculis ante tincidunt habitant ultricies quis posuere condimentum integer nisl elementumvivamus sem mauris aliquet placerat et dictum metus pharetra mauris eleifend volutpat a diam volutpat turpis dolor ac sem vulputate auctor eu mauris elementum augue tempor euismod augue elementum sit gravida vestibulum risus dapibus morbi proin at risus maecenas orci accumsan et eget massa eros ullamcorper accumsan',
			'freight' => 'velit congue sed nisi imperdiet dapibus eros purus id nam cursus maecenas hendrerit enim fermentum praesent dolor etiam eget nec eget velit lacus in maecenas ullamcorper risus integer nec velit ante ornare nisl dictum nunc nisi libero libero imperdiet nisi id tellus nec nam magna risus libero sit neque commodo id pellentesque blandit vitae nibh viverra et tristique in aliquam accumsan nulla praesent leo vitae eleifend eleifend turpis tellus',
			'duty' => 'laoreet hendrerit nibh amet hendrerit ornare molestie netus egestas nulla ac turpis vehicula at dapibus dapibus velit ultrices sed at ipsum id sem vestibulum sollicitudin amet ullamcorper proin amet lorem augue etiam sed lobortispraesent mattis magnis sapien at montes ornare et ac felis pellentesque sed condimentum hac lectus bibendum vivamus vestibulum urna varius nullam libero ut pellentesque justo placerat rhoncus maecenas imperdiet ultricies in non bibendum nisl nulla arcu',
			'purchase_order_id' => 'magna eu elit volutpat ru',
			'authentication_indicator' => 'purus nisi varius rutrum praesent vestibulum nunc in ultrices loborti',
			'cardholder_authentication' => '',
			'other' => 'laoreet ac aliquet dictumst at nunc nec placerat nec sem at vestibulum pharetra vitae massa diam lacus in tellus mauris at commodo odio turpis metus metus adipiscing sed dapibus metus amet dolor nulla velit velit et curabitur consectetur nisl venenatis etiam varius lorem fringilla aliquet congue tincidunt metus et volutpat cras feugiat mi vitae at ut id curabitur a consequat amet mauris leo nam hendrerit proin nisl non aliquet',
			'test_mode' => 0
		),
		array(
			'amount' => 17516.04864,
			'card_number' => 'mollis curabitur',
			'expiration' => 'tortor',
			'ccv' => 'nunc',
			'recurring' => 1,
			'transaction_id' => 'nam imperdiet nunc vivamus arcu tristique aliquam pretium pulvinar ul',
			'authorization_code' => 'condimentum id ut bibendum eleifend sem amet elementum augue quis ele',
			'invoice_id' => 'sit ligula a et feug',
			'description' => 'ante imperdiet in nisi rutrum lectus nisi placerat ullamcorper arcu justo at convallis at in sollicitudin sed tempor iaculis mi porttitor nisi nascetur nam non nam eget ullamcorper luctus nisi egestas non rhoncus facilisis aenean ac hendrerit et consectet',
			'line_items' => 'sed maecenas cursus in purus euismod quisque laoreet ac elit tincidunt nisi sociis augue morbi pulvinar malesuada sodales in volutpat ante amet laoreet posuere quis turpis nam metus et ipsum nunc ullamcorper malesuada orci odio blandit magna hac in quisque felis aliquam vestibulum risus etiam vivamus odio interdum mauris suspendisse nisi facilisis consequat eu ante libero consectetur nulla est tempor ante ullamcorper amet sit lacus purus vitae velit dis',
			'billing_first_name' => 'ut nulla luctus dui leo malesuada sed placerat pla',
			'billing_last_name' => 'curabitur sem dui suspendisse tristique nec luctus',
			'billing_company' => 'arcu mollis elit egestas eros varius erat lorem im',
			'billing_street' => 'ac nunc tincidunt cursus sit facilisi volutpat elit metus ve',
			'billing_city' => 'in mauris fringilla dignissim sollicitudin ante pulvinar vestibulum n',
			'billing_state' => 'odio maecenas nunc urna ullamcorper fringilla purus tristique nulla l',
			'billing_zip' => 'libero senectus erat dictum dolor ultricies enim nascetur at tempor p',
			'billing_country' => 'massa id pulvinar mauris mi bibendum interdum venenatis lacus est vul',
			'billing_phone' => 'malesuada odio at facilisis at platea ac volutpat semper augue magna ',
			'billing_fax' => 'varius tempor porttitor arcu nunc maecenas facilisi at nulla orci tin',
			'billing_email' => 'dui morbi integer vitae feugiat quis dictumst ac facilisi at in vulpu',
			'customer_id' => 'posuere risus pharetra habitasse dui a lectus felis mauris erat sit m',
			'customer_ip' => 'tristique leo iaculis etiam rutrum purus augue ac sed rhoncus diam fu',
			'shipping_first_name' => 'curabitur amet quis facilisis morbi nulla quis nisl vehicula ultrices',
			'shipping_last_name' => 'ullamcorper iaculis felis sapien sollicitudin et nisi dictum dapibus ',
			'shipping_company' => 'et non sed curabitur vulputate nisl suspendisse fringilla ornare feug',
			'shipping_street' => 'in curabitur libero consequat venenatis placerat in tincidunt ornare ',
			'shipping_city' => 'aliquet non bibendum in nam id massa vitae lacus nec aliquet ante at ',
			'shipping_state' => 'varius consectetur lectus interdum magnis lorem odio odio accumsan ul',
			'shipping_zip' => 'ultricies tempus arcu ante mi at hendrerit nunc hendrerit lorem ac te',
			'shipping_country' => 'hendrerit vestibulum at vitae eleifend diam in nulla eu metus arcu la',
			'taxes' => 'auctor leo tincidunt bibendum libero nec integer a nunc eu ac rutrum sem aliquam magna nam tempus tortor fusce velit fusce enim ante fringilla lectus dui rhoncus nam auctor velit in posuere ligula in mauris elementum commodo nec a tristique iaculis interdum at non ante aliquet in ut urna a mollis id purus laoreet quis natoque lectus leo suspendisse placerat consectetur ipsum fusce elementumvivamus nulla vitae eget platea dui',
			'freight' => 'vestibulum eleifend pellentesque nec non porttitor platea accumsan aliquet ultricies vitae platea vel at malesuada lorem et risus montes natoque odio ut vestibulum ut congue eu vitae adipiscing nisl nisl rutrum placerat eget eros nisl habitasse nunc dolor purus in posuere sit fermentum congue tempor nulla amet eleifend nibh aliquet in volutpat leo nunc a condimentum eget lectus integer aliquam habitasse turpis cursus viverra bibendum vel non nec vulputate',
			'duty' => 'et venenatis at metus quis at massa at ligula ut iaculis hendrerit euismod et facilisis urna suspendisse odio in dapibus purus ultricies maecenas condimentum velit vitae amet rutrum commododonec turpis velit vestibulum non eros fringilla posuere odio vestibulum nec nunc quis leo pellentesque at purus lobortis orci libero iaculis praesent vitae vitae in congue eget etiam nibh erat libero mauris urna ligula quisque purus id placerat viverra accumsan amet',
			'purchase_order_id' => 'vestibulum odio adipiscin',
			'authentication_indicator' => 'nec id nisi non lectus donec quis et et id velit ante vel dictum tinc',
			'cardholder_authentication' => '',
			'other' => 'sed suspendisse in in id mi nec massa turpisin justo id ipsum suspendisse sem ligula mauris elementum tristique felis in hac duis eu et urna porta dolor vitae nibh nulla lacus volutpat eros morbi arcu lectus condimentum nibh tincidunt dapibus amet ac a diam fringilla etiam faucibus eros in pulvinar odio ante vulputate nisl libero habitasse dui dapibus nulla molestie augue quam lectus accumsan a varius ligula risus libero',
			'test_mode' => 0
		),
		array(
			'amount' => 60.3369533,
			'card_number' => 'lorem dictumst a',
			'expiration' => 'suscip',
			'ccv' => 'null',
			'recurring' => 0,
			'transaction_id' => 'iaculis neque sed dui tempor id ac arcu eu nibh placerat volutpat hab',
			'authorization_code' => 'tincidunt at nam nam quis rhoncus interdum ligula elit tempus odio er',
			'invoice_id' => 'sit tincidunt id met',
			'description' => 'et sem eu eros facilisis ut quis pellentesque imperdiet erat turpis a sed tincidunt condimentum sit bibendum tristique id imperdiet aliquam eleifend platea non phasellus amet in hendrerit dui ligula accumsan dolor amet turpis malesuada nunc et cras mi pul',
			'line_items' => 'mi eget felis elementumvivamus at malesuada erat dui a gravida quis adipiscing posuere lorem eleifend purus erat id in elementum ornare lectus venenatis lorem et sed non enim senectus praesent blandit vestibulum cursus sollicitudin tincidunt eget iaculis ac imperdiet sed lacus commodo ullamcorper consectetur interdum sem non nulla duis tristique eros quam quis dui nec vestibulum mauris lobortispraesent a fringilla turpis sed lobortis hendrerit sed porttitor tellus gravida ac',
			'billing_first_name' => 'a ultrices aliquet viverra lectus integer lectus d',
			'billing_last_name' => 'orci fermentum nunc lobortis tristique lacus eget ',
			'billing_company' => 'augue risus at fusce laoreet pharetra odio non sed',
			'billing_street' => 'libero suspendisse bibendum odio venenatis dui ut ut at feli',
			'billing_city' => 'hac suscipit ultricies nunc et iaculis facilisis nisi diam praesent l',
			'billing_state' => 'quis porta venenatis mauris ultrices eu eget odio nec sit imperdiet v',
			'billing_zip' => 'risus tempor quis facilisis eleifend ligula cursus nec velit non sed ',
			'billing_country' => 'phasellus justo velit porta pretium etiam lacus sed aliquet sed ipsum',
			'billing_phone' => 'in sit interdum libero dolor posuere molestie curabitur donec euismod',
			'billing_fax' => 'aliquam tellus eget faucibus nisi volutpat in vel magna mus lectus he',
			'billing_email' => 'ligula enim purus suspendisse eleifend interdum felis metus ante aliq',
			'customer_id' => 'a lobortispraesent maecenas malesuada vestibulum lectus nec hendrerit',
			'customer_ip' => 'erat commodo odio sed dictumst malesuada suspendisse ligula lorem in ',
			'shipping_first_name' => 'facilisis vehicula amet porta hendrerit fringilla nisi massa eget tel',
			'shipping_last_name' => 'pulvinar eget nisi lorem praesent tincidunt luctus tincidunt massa co',
			'shipping_company' => 'tellus nisl eleifend iaculis ullamcorper ut lectus condimentum adipis',
			'shipping_street' => 'luctus rutrum et pharetra sed purus facilisis a purus venenatis sit c',
			'shipping_city' => 'interdum at lectus ipsumut dapibus ut neque arcu lacus nisl lacus hac',
			'shipping_state' => 'malesuada vitae lectus vel curabitur morbi massa ornare egestas sed p',
			'shipping_zip' => 'penatibus dictum sem justo lacus turpisin lacus at eros vitae erat id',
			'shipping_country' => 'ac aliquam libero et ultrices bibendum mus praesent hendrerit hac fus',
			'taxes' => 'dolor vel ac sem rutrum nisl porttitor felis cursus turpis ac lorem eu lectus magna morbi dapibus nulla pulvinar adipiscing cursus habitasse donec lorem tempor etiam tristique dignissim erat sit sollicitudin in tellus at et lacinia dui pulvinar accumsan pharetra at integer ultricies nisl est sapien hac augue in mi nunc ligula venenatis sed sodales volutpat arcu nisi lorem ante at ut ante fames bibendum purus leo id eleifend',
			'freight' => 'convallis varius ligula nunc risus eleifend aliquam lorem nunc dictum velit turpis consectetur donec mauris quis et metus eget iaculis ligula consequat ridiculus pulvinar sed sed ultricies dui dapibus et convallis lobortis sed eget sem vitae arcu magnis posuere sed sapien tempor pulvinar vehicula ultricies nulla facilisi nulla nisi adipiscing nec in dui luctus amet malesuada nec tortor viverra massa at nisl nisl pellentesque nisl velit rhoncus id in',
			'duty' => 'vestibulum accumsan nisi volutpat sodales adipiscing leo ante lectus malesuada fermentum eleifend eros bibendum integer quis ac massa nisl massa id imperdiet in adipiscing convallis nisi ipsum massa rutrum dolor eu cras vestibulum sed placerat turpis varius lorem risus hendrerit ipsum mus vestibulum accumsan in velit vitae venenatis ornare eleifend lectus convallis mattis rhoncus semper lectus elementum iaculis congue mauris duis pharetra ante eget erat aliquam luctus vel ut',
			'purchase_order_id' => 'id dictum habitant risus ',
			'authentication_indicator' => 'nunc at ligula enim pulvinar nibh molestie morbi convallis tempus tin',
			'cardholder_authentication' => '',
			'other' => 'id lorem volutpat a fermentum faucibus maecenas tincidunt id in euismod risus aliquam eu natoque fusce pretium nulla nunc tristique justo tellus curabitur ut erat vitae aliquam eget consequat bibendum hac nibh luctus vitae eleifend vulputate in nisi mauris rhoncus mollis malesuada ac in tempus et pellentesque mauris ut turpis a curabitur porttitor morbi tincidunt iaculis eros venenatis nisl at lobortis velit volutpat hendrerit proin sodales viverra interdum odio',
			'test_mode' => 1
		),
		array(
			'amount' => 1845.027102,
			'card_number' => 'proin consectetu',
			'expiration' => 'velit ',
			'ccv' => 'proi',
			'recurring' => 1,
			'transaction_id' => 'ultricies hac nec imperdiet urna consectetur adipiscing sapien turpis',
			'authorization_code' => 'euismod commodo lectus nulla interdum malesuada porta leo donec morbi',
			'invoice_id' => 'turpis enim in lorem',
			'description' => 'dictum massa volutpat tristique vulputate mattis leo eros fermentum ultrices ridiculus libero et ultrices ullamcorper adipiscing tellus tempus consectetur eu vivamus massa dapibus in venenatis eros vestibulum adipiscing tellus gravida nunc pretium est mau',
			'line_items' => 'duis massa consectetur vitae nec ligula imperdiet nec velit euismod faucibus lacinia bibendum ullamcorper a vestibulum nulla iaculis augue sed risus purus risus nisl integer pulvinar purus ullamcorper mi mauris vitae luctus suspendisse volutpat velit nulla morbi cursus penatibus tempor tristique malesuada erat ante volutpat augue vitae id eu turpisin lectus vestibulum ligula in tincidunt sed eget eu semper maecenas et sed rutrum ultrices ipsum mauris posuere tristique nisi',
			'billing_first_name' => 'sed augue nibh velit eleifend rhoncus pretium nequ',
			'billing_last_name' => 'blandit eu leo convallis convallis lorem at etiam ',
			'billing_company' => 'cras ultricies facilisi mauris est luctus dapibus ',
			'billing_street' => 'vestibulum tristique risus accumsan velit sapien lorem justo',
			'billing_city' => 'faucibus in ultrices eleifend est libero purus sed turpis neque turpi',
			'billing_state' => 'facilisi vitae lorem velit parturient urna nulla nibh fusce et fermen',
			'billing_zip' => 'tincidunt faucibus integer massa nisi quisque bibendum dictumstphasel',
			'billing_country' => 'volutpat donec laoreet sed dignissim nam parturient dapibus a arcu vi',
			'billing_phone' => 'nec proin ultrices sed consectetur diamphasellus ac ligula volutpat n',
			'billing_fax' => 'risus suspendisse posuere nulla pretium morbi in phasellus lectus bib',
			'billing_email' => 'quis risus id facilisis mi risus tempor malesuada arcu placerat imper',
			'customer_id' => 'vitae nam sit eu vestibulum mauris tortor ante massa felis eget volut',
			'customer_ip' => 'aliquet integer tempor sed id et consectetur lorem id a est purus at ',
			'shipping_first_name' => 'at iaculis cursus purus velit eros a interdum nec metus mi enim et at',
			'shipping_last_name' => 'dolor orci nam in nibh suspendisse odio id nam sit justo sed aliquam ',
			'shipping_company' => 'mauris imperdiet tincidunt sem purus gravida eget quisque hendrerit p',
			'shipping_street' => 'lacus condimentum sem posuere luctus eros libero nam ac odio sociis n',
			'shipping_city' => 'porta ut venenatis nibh at sed tellus quis consectetur nibh ante curs',
			'shipping_state' => 'imperdiet fringilla aliquet consectetur nisl nunc morbi libero tristi',
			'shipping_zip' => 'ultricies dignissim praesent dignissim sit pulvinar varius erat in or',
			'shipping_country' => 'elementum varius enim non vestibulum lorem quam dignissim curabitur i',
			'taxes' => 'metus purus pellentesque luctus porta vestibulum in sodales tristique auctor congue ipsum iaculis iaculis mauris platea bibendum euismod lacinia vel amet mattis at sodales augue lorem massa id leo quis eleifend libero accumsan aliquam proin suspendisse consectetur vel ultricies volutpat mauris nisi gravida risus ligula eu a integer ligula consectetur mauris hac donec eleifend in tellus fusce ante ipsumut faucibus posuere vulputate integer dis a luctus vestibulum fringilla odio',
			'freight' => 'ac ligula nunc sed rhoncus dapibus diamphasellus at facilisis et congue cursus pulvinar venenatis lorem vel et pharetra ligula et porta pulvinar dis vulputate in porta montes iaculis aliquet at nec erat ultrices quis rhoncus venenatis ultrices vulputate et eget dolor erat ac ipsum elit velit lacus lorem phasellus vivamus id hac iaculis accumsan dictumst venenatis felis posuere volutpat ipsum aliquet in venenatis nulla consectetur quis amet elit est',
			'duty' => 'non vestibulum diam aliquet donec elementum leo ac ullamcorper eget tempor pulvinar tincidunt metus pulvinar blandit at purus pellentesque aliquam lacus ultrices curabitur est dolor proin risus iaculis rutrum aliquam pretium quis dignissim in turpis dictum auctor sed vitae amet accumsan libero luctus id fringilla varius tristique velit dictumstphasellus massa bibendum vivamus platea eget nec sapien iaculis et volutpat elit senectus at platea orci id erat lacus ridiculus lacinia',
			'purchase_order_id' => 'iaculis a mollis mauris m',
			'authentication_indicator' => 'libero ipsum a arcu eget arcu ullamcorper placerat posuere nec eleife',
			'cardholder_authentication' => '',
			'other' => 'sem est ultrices eget tincidunt sed luctus malesuada tristique turpis metus quis iaculis urna mollis volutpat amet nascetur mauris mauris in varius lacus mauris lorem ac libero consequat aliquam risus ut convallis nulla placerat vitae integer lectus nisi facilisi odio metus sem ornare hendrerit dui vitae molestie quis imperdiet aenean ac erat placerat parturient aliquam quis ligula ligula sed in lectus eget at sapien id erat pulvinar dignissim purus',
			'test_mode' => 1
		)
	);
}
