/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : auth

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-05-09 19:18:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `sys_article`
-- ----------------------------
DROP TABLE IF EXISTS `sys_article`;
CREATE TABLE `sys_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `keywords` varchar(200) DEFAULT NULL,
  `source` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `cover` varchar(200) DEFAULT NULL,
  `content` text,
  `categoryid` int(11) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `isshow` int(11) DEFAULT '1',
  `istop` int(11) DEFAULT '0' COMMENT '是否置顶',
  `isslide` int(11) DEFAULT '0',
  `ishot` int(11) DEFAULT '0',
  `isspecial` int(11) DEFAULT '0',
  `isstressed` int(11) DEFAULT '0' COMMENT '强调 加粗',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_article
-- ----------------------------
INSERT INTO `sys_article` VALUES ('11', '网上盗刷事件频发，风险肇始于“快捷支付”？', '支付', '', '除电话诈骗外，目前银行卡主要通过技术手段的盗刷犯罪手段主要分为线上和线下两种。线下盗刷从复制磁条盗窃密码到改造POS复制付款令牌等等不一而足，随着金融IC卡的逐渐普及以及降级交易的逐渐关闭，此类风险事件的发生概率在逐渐减少；而网上盗刷这个新的犯罪手法，则在短短的五六年内急速发展。由于网上盗刷具有批量化、无需接触受害者实体介质等特点，总量已反超线下盗刷。', '2016-04-27/57205abd74a3a.jpg', '&lt;p&gt;而在很多报道中，以分析技术问题为主要内容，以痛斥银行不给赔付最终第三方支付解决问题以及电信运营商管理不力导致验证码泄露结尾，却只字不提网上盗刷的渠道所存在的问题，仿佛“它”就应该摆在那里不做改变一样。&lt;strong&gt;然而要想解决网上盗刷问题，渠道绝不应该是被忽视的地方。&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p label=&quot;大标题&quot; class=&quot;text-big-title&quot;&gt;快捷支付的前世今生&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;前面提到的网上盗刷的渠道，大部分都是通过一个名为“快捷支付”的业务进行的。而这个业务本质上是第三方支付所提供，由支付宝首创，在发展一定时间后各家第三方支付开始跟进。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;支付宝在当时发展快捷支付是有其客观需求的。在淘宝发展的早期，网上支付量快速增长，特别是“双11”这类人造购物节日更是集中了很长一段时间的流量在一天内爆发。而大部分银行的网关支付相关建设并没有为这种爆发性的交易需求做好准备，导致实际支付成功率与支付宝所期望的有一定差距。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;因此，&lt;strong&gt;支付宝便要求银行为其提供类似于代扣水电费保费之类的代扣功能，绕开了银行本身的网关支付，减少了双方核心系统之间的通讯环节，提高了支付宝实际付款的成功率。&lt;/strong&gt;鉴权/核身+代扣，这就是快捷支付的早期形态。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;在那个时候，从银行角度看快捷支付并不是一个太大的问题。在收益方面有支付宝沉淀的存款和个人客户新开卡，还可以降低网关支付的压力；在风险方面支付宝当时已经发展到一定规模因此卷款跑路的可能性很小，如果出现小范围风险问题也可以将接口关闭，完美。至于互联网金融，那是什么？&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;2011年4月，支付宝的快捷支付正式推出，风险问题也随之而来。同年8月银监会下发《关于加强电子银行信息管理工作的通知》，要求快捷支付类产品首笔业务前必须经由银行方进行身份验证。而快捷支付实际上只是由第三方支付向银行发送客户在银行所预留相关信息和手机号码来核对客户身份进行开通，并不是由银行在其自身的物理或电子渠道进行客户身份验证，自然更谈不上确认客户自行开通的意愿。银行据此向支付宝提出修改意见，但有传言称支付宝以影响客户体验为由拒绝了，这也是之后2014年工行支付宝之争中工行方指责支付宝“快捷支付违法”、“拒不改正”的原因。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;在现在看来，银监会在2011年所下发的管理文件从风控角度讲其实已经看到了快捷支付的风险点所在，在执行方面却出现了问题。在之后的几年中，各类隐私泄露日趋严重，通过快捷支付渠道的网上盗刷案件急速增加，而包括支付宝在内的第三方支付早已经发展到一个很大的规模，快捷支付为很多客户所接受，接口已经不能随意关闭，如不寻找其他方式进一步收紧限制，银行原本的风控设计将沦为空谈。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;2014年3月前后，四大行分别下调包括支付宝在内的所有第三方支付快捷支付渠道限额，以此来降低被盗客户在盗刷案件中的损失金额。但四大行安全程度较高的网关支付限额并未同步调整，因此在部分业内人士看来，此举应是监管层非公开指导下的风险防控行为。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;然而当时恰逢余额宝发布不足一年，银行间市场资金荒仍未退去，高企的货币基金利率所引发的投资狂热使得余额宝在某个层面上成为了支付宝的护身符，“谁敢动支付宝就是要动余额宝，而谁敢动余额宝就是与人民为敌”俨然成了那个时间段网络上的政治正确，四大行的限额调整自然被骂的狗血淋头，即使再三强调通过网关支付仍可投资余额宝也收效甚微。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;最终，事情以支付宝指责工行“知法犯法”后将备付金存管账户转至建行，四大行逐步将原来由各省分行分头接入的各家第三方支付快捷支付接口统一上收至总行管理，监管当局再次发文强调对银行和第三方支付公司的合作要加强管理而结束。&lt;strong&gt;至于四大行到底是为了风险控制还是如阿里所指责的那样为了限制余额宝发展，已成为一场罗生门。&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p label=&quot;大标题&quot; class=&quot;text-big-title&quot;&gt;防弹衣的缺口&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;事实上，快捷支付被银行诟病已久，从开通到每次支付，都与银行传统的风控理念相去甚远。目前快捷支付的开通方式是由第三方支付向银行发送客户输入的银行所预留相关信息和手机号码来核对客户身份进行开通，并不验证银行卡密码。但从银行角度来看，个人客户资金的安全措施最重要的是密码以及本人现场验证，其他信息和方式都仅仅是辅助。而快捷支付所验证的身份资料、预留手机号等都不是银行眼中的关键性安全因素，在实际上打破了银行原有的支付安全体系。即使银行后来为竞争而推出了类快捷支付产品，但开通验证内容中必须有卡密码，这也从一个侧面验证了银行和第三方支付对关键性安全因素的认识差异。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;2015年底，马云对传统金融和互联网企业的风控区别是这么评价的：“传统金融可能做的风险是把防弹衣做得越来越厚，越来越好，而我们的创新是让杀手根本不可能靠拢你。”从这个角度看，快捷支付实质上是第三方支付在银行以密码为安全核心的“防弹衣”上破坏出的一个缺口，虽然有安全措施，但“杀手”只要被漏过来，资金被盗就是必然的结局。因此，&lt;strong&gt;目前通过快捷支付被盗的资金由第三方支付而不是银行进行赔付也是有其道理所在，&lt;/strong&gt;并不是像某些媒体所说银行店大欺客只有第三方支付才为客户考虑之类。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p label=&quot;大标题&quot; class=&quot;text-big-title&quot;&gt;隐私的泄露与黑色产业链&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;如果仅仅是防弹衣上存在缺口但无人利用，并不会有目前如此猖獗的盗刷行为。然而目前个人隐私泄露的情况可以说是触目惊心，快捷支付与银行方核对的客户相关信息早已经不能作为识别客户身份的完善依据，更不足以成为防范风险的屏障。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;4月10日，中央电视台新闻三十分节目中播出了银行卡盗刷的来龙去脉。大概内容说的是犯罪分子通过伪基站发送钓鱼短信、架设免费WIFI、改装POS等方式盗取个人信息、短信验证码和银行卡信息，再通过复杂的黑色产业链最终将资金窃取。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;事实上，包括你我在内的绝大多数普通人的隐私早已经在某一群人手中流传。任何一个存储海量个人信息的网站被“拖库”或被内部人卖出后，这群人的饕餮盛宴便随之开始，而依靠这些个人信息和密码来进行客户身份验证的网站自然成为下一轮攻陷的目标，最终他们的数据库将会成为比你我更了解自己的存在。例如某些人仍在津津乐道的“社工库”，暴露在大众面前的不过是冰山一角，多个不同渠道拿到的数据库根据身份证和手机号等关键键值就可以将信息匹配在一起，对每个人的隐私信息都有了完美的画像，在黑色产业链中形成了另外一个意义上的“千人千面”。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;除了非法手段之外，很多企业对客户的隐私的漠视也是隐私泄露的重要原因。比如目前移动要求客户更换4G卡时将客户常去的地址提供给电话营销人员、之前爆出的蚂蚁花呗催收通过联系关系人来提醒借款人进行还款的方式等，都是将客户隐私交给组织内权限较低的人员甚至外包人员，大大增加了泄漏的可能和日后追责的难度。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;至此，快捷支付与银行所核对的信息已经失去了验证客户本人身份和意愿的能力，只有手机验证码在苦苦抵挡。&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p label=&quot;大标题&quot; class=&quot;text-big-title&quot;&gt;躺着也中枪的电信运营商&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;“如果我决定用支付宝做我家大门的门锁，被盗了之后可以指责它嘛？”这是笔者一个在移动工作的朋友所讲的笑话。虽然听起来是无稽之谈，但这却正是电信运营商在网上盗刷案件中所面临的窘境。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;短信验证码是快捷支付核对用户身份的重要环节。然而手机通讯技术经过了多年的发展，从模拟信号到GSM，再到现在的4G LTE以至未来的5G，技术一直在不断的进步，网速越来越快，通话质量越来越好。但各代技术却有一个共同点：手机号码及短信不作为重要安保措施。即使体量大如移动，也一直是在NFC这条路上前行。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;这其实是很正常的思路。对电信运营商来说，主营的电信业务实际上所涉及的客户资金只有话费，而话费提现要经过很复杂的流程且金额并不大，因此没有多少对卡及手机号安全方面保护的想法，若不是国家要求恐怕连实名制的想法也没有。毕竟即使卡丢失或补办，对电信运营商及其客户也不会有什么直接性的损失。直到有一天，他们被绑架到了快捷支付的战车上，才发现自己虽没有从中获得多少利益，却已被千夫所指。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;目前，除了常见的伪基站伪造号码以及批量发送钓鱼短信之外，电信运营商所提供的一些服务也成为犯罪分子利用的工具。比如之前的短信保管箱保存短信验证码、最近爆出的通过邮箱发送诈骗短信等等。而虚拟运营商的170号段更是成为了钓鱼短信发送的重灾区。&lt;strong&gt;这些问题都在实际上将快捷支付所撕开的缺口越扯越大。然而换个角度看，第三方支付这种“没打招呼就从隔壁邻居家拿根油条当门栓”的方式又有什么立场来指责“油条”不够坚固呢？&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p label=&quot;大标题&quot; class=&quot;text-big-title&quot;&gt;监管与未来发展&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;前面的分析里，银行、第三方支付公司、电信运营商看起来各自有各自的原因和委屈，然而即使谁都没错，用户的钱被盗了也是事实。因此整个链条上的企业都应该主动承担更多的社会责任，毕竟资金的风险问题还是遵循着木桶理论的。目前，银行及电信运营商已在电话号码用户识别、换卡二次验证、伪基站自动排查、钓鱼网站拦截等方面做了大量的工作，但对于快速扩散的网上盗刷案件来说，仍有很长的路要走。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;同时，监管方面并没有选择继续等待。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;2015年12月底，央行出炉了《非银行支付机构网络支付业务管理办法》。在这个文件中，央行强调了银行是客户资金安全的管理责任主体，应在首笔交易时自主识别客户身份并与客户直接签订授权协议，承诺无条件全额承担此类交易的风险损失先行赔付责任，这其实是对银行提出了对快捷支付特别是开通方面的管理要求，与11年银监会的文件在本质上一脉相承。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;另外，《办法》中也规定了支付机构对不能有效证明因客户原因导致的资金损失及时先行全额赔付，并对支付机构进行了风险分类，风控能力较弱的第三方支付每笔200元以上非定期的快捷支付都必须由银行方进行验证，风控能力较好的第三方支付可以与银行通过协议自主约定由支付机构代替进行交易验证，但必须将支付相关信息告知银行。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;2016年4月，《非银行支付机构分类评级管理办法》正式出台。结合前面提到的《非银行支付机构网络支付业务管理办法》来看，一些技术能力不足，业务水平有限，风控能力较差的中小型第三方支付公司将逐渐弱化，直至退出舞台；而技术能力较强、业务水平较高、风控能力较强的大型第三方公司将获得优待。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;同月，中央十四部委联合印发了《非银行支付机构风险专项整治工作实施方案》，&lt;strong&gt;第三方支付包括快捷支付在内的直连银行模式可能将在一段时间后走到终点，取而代之的可能是一个新的网络支付结算平台。&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;当这些监管文件落实到位的时候，我们可能需要告别原有模式的快捷支付；而迎接我们的，则是一个依然便捷但更加安全的未来。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '33', '1461738159', '1461741069', '1', '1', '0', '1', '0', '1', '0');
INSERT INTO `sys_article` VALUES ('9', 'iPhone销售首度下滑？其实拐点早有信号', '苹果，iphone，手机', '', '的事情还发生在为苹果提供闪存等元器件的海力士上。根据海力士2016年第二季度财报，相比去年同期营收下滑65%，但海力士业务范围广泛，闪存行业降价、PC换代节奏过慢等因素同样作用于海力士，毫无疑问，苹果的因素也是其中之一', '2016-04-27/5720354e4f7d0.jpg', '&lt;p&gt;北京时间4月27日凌晨，对苹果来说注定是一段难熬的时间，苹果2016年第二财季财报公开，季度业绩为近13年来最差。自从iPad销量下滑后，\r\n分析师将其归咎于iPad产品过于出色而稳定影响了产品换代，而本季度占苹果营收大部分iPhone销量相比上年同期首度下滑，只好称现在这个苹果的拐点\r\n已至？看起来就是这样。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p class=&quot;text-big-title&quot; label=&quot;大标题&quot;&gt;成也中国，衰也中国&lt;br class=&quot;text-big-title&quot; label=&quot;大标题&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;财报显示，苹果公司第二财季营收为505.57亿美元，比去年同期的580.10亿美元下滑13%；净利润为105.16亿美元，比去年同期的135.69亿美元下滑22%。每股摊薄收益1.90美元，低于去年同期的2.33美元。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;国际市场占整个苹果营收的67%，分地区看，传统美欧市场分别下滑10%与5%；&lt;strong&gt;大中华区营收125亿美元，相比去年同期168亿下降26%，在主要销售区域中下滑最多，贡献了整个季度利润下滑的58%&lt;/strong&gt;；同样面临严重下滑24%的还有亚太地区，但考虑到亚太地区体量较小，对整体财报的影响远不及中国；而日本市场营收则从去年同期的34.5亿美元有24%的增长，为42.8亿美元。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;在这个层面上可以这样判断，对于换芯不换壳的iPhone 6s，发达地区的用户接受能力明显高于发展中地区。苹果如果希望扭转颓势，最紧迫的就是要设计一台能在发展中国家掀起苹果热潮的新手机，如当年的iPhone 4或iPhone 5。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p class=&quot;text-big-title&quot; label=&quot;大标题&quot;&gt;iPhone拐点，iPad继续下滑，Mac缓慢下降，服务收入比重上升&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;考\r\n虑到电子设备销售的周期性，相对上一季度的数据往往不具备参考价值，每年的第四季度（美国上市公司的第一财季），因美国的感恩节与圣诞节、中国的双十一电\r\n商等节日促销以及消费者具有较强的消费能力，再加上苹果会在9月份发布新iPhone，这往往使第四季度表现在一年中最为突出。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;分\r\n设备看，iPhone销量相比去年同期首度发生下降，第二财季中，iPhone销售共计5119万部，相比去年同期6117万部下滑18%。消费者会喜欢\r\n首次引入大屏的iPhone 6，但不代表iPhone 6的外观设计真的能让消费者接受并愿意保持外观不变升级到iPhone \r\n6s，用户需求的减弱是一方面，福布斯发表评论中判断三星的时间差策略也导致了第二财季苹果销售的失败，新的Galaxy \r\nS7在三月登场引起了消费者观望态度。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;占苹果总营收65%的iPhone产品线，iPhone也是导致全公司营收下滑的绝对大头，仅iPhone产品线的同比营收下滑就与整个苹果下滑的数额相当。&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;iPad\r\n设备的销售乏力比iPhone \r\n更甚，同比下滑19%，而且这不是第一个发生销量下滑的季度，在这样的速度下，iPad产品线将面临迅速萎缩。苹果在去年选择推出iPad \r\nPro来提振销量、塑造iPad的高端形象，并希望侵占PC换代时期的市场份额，但以失败告终。本次的财报并没有具体的分型号销量，但按照往年的情\r\n况，iPad mini这款廉价平板的销量最高——比起iPhone的占据高端导致廉价机型iPhone \r\nSE不好卖，iPad系列反而是低端产品更加出色，消费者对不同产品线的品牌认知并不统一。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;而产品服务与“其他设\r\n备”营收则分别有30%和20%的增长，服务营收的比重也从去年同期的8.6%上升到本季财报的11.8%，苹果服务已经站稳阵脚。而其他设备——包括但\r\n不限于Apple Watch和iPod等，营收总计22亿美元，仅为iPhone产品线收入的1/15，苹果至今没有公开过Apple \r\nWatch销量，但销量仍可见增长。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p class=&quot;text-big-title&quot; label=&quot;大标题&quot;&gt;苹果的问题，也影响了整个供应链&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;之所以说苹果的财报表现欠佳早有信号，就是来自供应链企业陆续发布的财报表明存在严重的营收下降情况。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;iPhone的供应商之一蓝思科技，根据前些天的2015年财报，苹果的订单在总营收中占48.4%。但在早些时候的2016年第一季度预报中，第一季营收相比去年同期锐减80%，一方面原因是苹果销售不力，另一方面是随着时间的推移，供应商的报价也在随之下降。&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;同\r\n样的事情还发生在为苹果提供闪存等元器件的海力士上。根据海力士2016年第二季度财报，相比去年同期营收下滑65%，但海力士业务范围广泛，闪存行业降\r\n价、PC换代节奏过慢等因素同样作用于海力士，毫无疑问，苹果的因素也是其中之一。被戏称为闪存厂、攫取高额内存差价的苹果，对闪存的供应商可没有那么大\r\n方。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '33', '1461728636', '1461728636', '1', '1', '0', '1', '1', '1', '0');
INSERT INTO `sys_article` VALUES ('10', '活跃度高就是好社群？手把手教你怎么建立一个好的社群', '活跃度，标准，团体', '', '什么样的社群才是一个好社群？我想，对于这个问题，广大的社群人一定绞尽过无数次脑汁，每个人的心中都有一个自己的标准。然而，目前市面上流行的一些对社群的评判标准，都太浮于表面，比如说：', '2016-04-27/57205a5ca16e0.jpg', '&lt;p label=&quot;大标题&quot; class=&quot;text-big-title&quot;&gt;一、好的社群到底有没有标准？&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;什么样的社群才是一个好社群？我想，对于这个问题，广大的社群人一定绞尽过无数次脑汁，每个人的心中都有一个自己的标准。然而，目前市面上流行的一些对社群的评判标准，都太浮于表面，比如说：&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p label=&quot;小标题&quot; class=&quot;text-sm-title&quot;&gt;活跃度高就是好社群？&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;活跃和互动应该是大多数社群梦寐以求的东西，但是，很多所谓活跃的社群，往往被闲聊灌水、垃圾信息刷屏，你能说这是一个好社群吗？&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p label=&quot;小标题&quot; class=&quot;text-sm-title&quot;&gt;有一套好的门槛群规就是好社群？&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;是啊，你在社群创建之前就设置了一套一套的门槛进行筛选，如此成员质量该很高了吧？非但如此，你还制定了一系列的群规，该干什么不该干什么，这样我该收获一个高质量社群了吧？&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;可现实情况却是，群成员大多积极性不高，甚至不发言，你能说这是一个好社群吗？&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p label=&quot;小标题&quot; class=&quot;text-sm-title&quot;&gt;能赚钱能变现的就是好社群？&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;且不说如今能变现的社群少之又少，就算是那些所谓已经变现了的社群，大多靠的是收费和卖货。本人在先前文章（&lt;a href=&quot;http://www.huxiu.com/article/145500/1.html?f=member_article&quot; target=&quot;_blank&quot;&gt;《垃圾社群营销，社群的刽子手？》&lt;/a&gt;）中已有论述，这种变现模式不具备可持续性，犹如竭泽而渔，你能说这是一个好社群吗？&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;凡此种种，这些所谓的标准都是很随意很片面的，实际上相当于没标准，从而无法真正对一个社群做出客观有效的衡量。&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p label=&quot;大标题&quot; class=&quot;text-big-title&quot;&gt;那么，问题来了，到底好社群的标准是什么？&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;从以上的分析可以看出，评判一个社群的好坏，不能简单用一些表面数据去衡量，而应从社群的本质内涵着手。这样制定出来的评判标准，才更加客观，对于社群的运营也才更具指导价值。据此，我认为衡量一个社群好坏的根本性标准是：&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;能够更好地完成社群目的的社群才是个好社群。&lt;/strong&gt;&lt;/p&gt;&lt;p label=&quot;小标题&quot; class=&quot;text-sm-title&quot;&gt;&lt;br/&gt;怎么理解？&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;这里，我们先来了解一个理论，来自北师大张江教授关于“复杂系统”的研究，我把它简化为“目的——控制”理论，具体来说就是：&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;blockquote&gt;&lt;p&gt;个体通过一套简单规则的运作，会形成自组织、自适应的去中心化群体，进而会“涌现”出超越单个个体目的的群体目的。群体目的形成后，又会不断发出指令，反过来对个体进行控制。&lt;br/&gt;&lt;br/&gt;总之，个体通过这套简单规则的运作，往往会生发出非常复杂的系统。&lt;/p&gt;&lt;/blockquote&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;回到社群，我们可以这样认为：&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;blockquote&gt;&lt;p&gt;群成员通过一套“简单规则”连接在一起，形成了自组织、自运行的社群，进而“涌现”出了超越单个群成员的社群目的。有了社群目的，社群就能对群成员发出指令形成控制，并通过控制实现社群目的。&lt;br/&gt;&lt;/p&gt;&lt;/blockquote&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;同时，群成员在这套“简单规则”的运作下，往往会创造出巨大价值，这是单个群成员无法完成的。&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;因此，“能更好地完成社群目的”，本质上是完成这个“目的——控制”的过程。如此，方能称作是一个成功运作了的社群。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img style=&quot;max-width:100%;height:auto;&quot; id=&quot;loading_inh4eq40&quot; src=&quot;http://images.huxiu.com/article/content/201604/26/1537559829.png?imageMogr2/strip/interlace/1/quality/85/format/png&quot; title=&quot;&quot; alt=&quot;clipboard.png&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p label=&quot;小标题&quot; class=&quot;text-sm-title&quot;&gt;为什么说这才是一个好社群的标准？&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;众所周知，目前绝大多数社群，特别是建立在微信群上的社群，都是混乱无序的。而我们知道，&lt;strong&gt;社群不是群成员简单地叠加在一起的，它是有机的，因此必须是有序的。&lt;/strong&gt;&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;回过头来，一个社群如果能完成“目的——控制”的过程，那么它便能通过社群目的发起控制指令，进而使社群从无序到有序。&lt;strong&gt;有序才会有价值，才会涌现出来“1+1&amp;gt;2”的群体智能。&lt;/strong&gt;&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;说到这里，我们有必要来认真谈谈社群目的了。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p label=&quot;大标题&quot; class=&quot;text-big-title&quot;&gt;三、社群目的到底是谁的目的？&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;我们知道，目的是发出指令、实现控制的理论依据、伦理基础。如果没有社群目的，任何控制手段都缺乏支撑，必定是无效的，对群成员也就失去了实际的控制力。&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;不过，我所讲的社群目的，它既不是社群群主的目的，也不是单个群成员的目的。&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;在实际的运营中，很多人把社群群主的目的当做了社群的目的，比如：&lt;/strong&gt;&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;打着社群的旗号做培训。&lt;/strong&gt;甚至可以说，如今市面上零零总总的各种社群，90%都是培训群。无论是知识分享，还是技能培训，本质上都是社群主在变现自己的知识和技能。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;打着社群的旗号收会费。&lt;/strong&gt;如果只把收费当做入群的门槛，倒无可厚非。可是现今很多收费社群走入了误区，把收费当做变现手段，当做社群目的，动辄几千上万。其实，这本质上是社群主在变现自己已有的影响力和势能。试问，有几个社群主能做到？&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;打着社群的旗号卖产品。&lt;/strong&gt;正如我先前文章所说，这是把社群当渠道，本质上是社群主在变现自己的产品和服务。如今很火的网红电商社群，以及各种营销群，其实都是在完成社群主的目的。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;这样做的后果是，有可能群成员不买账，自然积极性就不高，最终无法实现社群目的。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;另一方面，有的人把单个群成员的目的当做了社群的目的，比如：&lt;/strong&gt;&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;把社群当做人脉渠道。&lt;/strong&gt;进群疯狂加好友，社群成了群成员所谓拓展人脉的地方。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;把社群当做发泄渠道。&lt;/strong&gt;社群成了群成员发泄情绪、无意义吐槽的地方。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;这当然也有不良后果：社群将失去控制，陷入混乱，最终有可能毁灭社群。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p label=&quot;小标题&quot; class=&quot;text-sm-title&quot;&gt;说到此，社群的目的到底是什么呢？&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;我们所说的社群目的，是群成员通过一套简单规则，相互互动，相互交流，进而自发涌现出来的、高于群主和单个成员的一种目的。&lt;strong&gt;通俗来说，社群目的是群成员在相互交流碰撞中达成、并且一致认同的共同目标等。&lt;/strong&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;在具体实践层面，社群目的可分为：&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;1、商业目的&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;这与普通的“产品从B端到C端”式卖货不同，而是从一开始就基于社群收集群成员需求，通过股权众筹、产品众筹等方式让群成员参与进来，打造符合用户需求的品牌或产品。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;如果运作得好，甚至产品本身就是共同的社群目的，比如我们熟知的小米社群。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;2、非商业目的&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;我认为社群更为本质的目的在于交流思想，实现“1+1&amp;gt;2”的群体智能涌现。当然，这里的交流思想，不是简单的“分享+讨论”，而是每个群成员都能利用简单规则完成简单任务，自主创造内容，进而迸发出高质量UGC。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;值得注意的是，社群目的一旦涌现，它将不以个人的意志为转移。&lt;/strong&gt;&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;无论是社群主还是群成员，个人目的的改变不会引起社群目的的改变；就算有部分群成员退群了，社群依然会自动发出指令，自我维持，添加新的成员加以补充，继续朝着共同的社群目的而前行。&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;社群目的的变化只会发生于群成员的相互交流互动中，而不会静态地裂变。这也是很多社群可以利用淘汰制剔除旧成员，并不断吸纳新成员的理论依据。&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;当然，你尽可以把社群主或单个群成员的目的当做社群目的，不过，这肯定会限制社群的自发展，群成员也无法在简单规则的作用下创造出更大的价值，社群将缺乏丰富性和多样性。而这，本质上已不再是我所认为的社群了。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p label=&quot;大标题&quot; class=&quot;text-big-title&quot;&gt;四、实现社群目的的保障——控制&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;我们知道，要想达成目的，群体必须有序，要实现有序，必须对群体渗入控制。所以说，控制是达成社群目的的保障。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p label=&quot;小标题&quot; class=&quot;text-sm-title&quot;&gt;1、简单规则——社群实现控制的手段&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;现实生活中，实现控制的手段多种多样，比如：&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;ul class=&quot; list-paddingleft-2&quot; style=&quot;list-style-type: disc;&quot;&gt;&lt;li&gt;&lt;p&gt;国家要实现有序，采取的是国家机器手段控制；&lt;br/&gt;&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;军队要实现有序，采用的是命令和纪律进行控制；&lt;br/&gt;&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;企业要实现有序，利用的是一套组织行为学进行控制，具体来说，就是薪酬，绩效，股权等等。&lt;br/&gt;&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;社群要实现有序，应当采取什么手段进行控制呢？&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;我认为，如果要对社群成员形成控制，必须采取一套“简单规则”。如果说控制是实现目的的保障，那么规则就是实现控制的手段。本文已多处出现了“简单规则”了，到底什么是简单规则呢？简单规则有何巨大能量？&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;我们先来看一个蚂蚁的例子：&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;blockquote&gt;&lt;p&gt;蚂蚁由于体型弱小，视力不佳，在觅食活动中，每只蚂蚁只能完成非常简单的任务。它们的行为规则也非常简单：从蚁巢出发，见到食物就折返，同时沿途释放信息素以吸引其他同伴。然而，就是这么简单的行动，使得蚂蚁找到了食物和巢穴之间的最短路径。&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;原来，蚂蚁在寻找食物的过程中，有的走了直路就发现了，而有的走了弯路才找到。由于蚂蚁释放的信息素挥发很快，导致长通路没有短通路有吸引力。于是，越来越多的蚂蚁能通过越来越短的路径到达食物处，而那些比较少蚂蚁走、信息素淡的路径便慢慢被放弃掉。由此，一条从巢穴到食物处的最短路径出现了。&lt;br/&gt;&lt;/p&gt;&lt;/blockquote&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img style=&quot;max-width:100%;height:auto;&quot; id=&quot;loading_inh4fmax&quot; src=&quot;http://images.huxiu.com/article/content/201604/26/1538377546.png?imageMogr2/strip/interlace/1/quality/85/format/png&quot; title=&quot;&quot; alt=&quot;804876273018000609.png&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;这就是通过简单规则的控制，让个体相互作用，相互互动，形成有序价值，从而爆发群体智能的伟大之处。而对于社群来说，简单规则的核心是一套发言机制、议事规则。它固化了群成员间的配合方式，告诉群成员先做什么，后做什么，以及怎么做。&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;社群不像国家和军队，可以采取暴力手段控制，也不像企业，可以靠薪酬控制——这是因为，社群成员之间是弱关系连接。&lt;/strong&gt;因此，我所说的对社群进行控制，不是一般意义上的强制性措施。而是通过“简单规则”，群成员形成自组织自运行，自发产出高质内容，从而实现社群目的，并且涌现巨大价值，&lt;strong&gt;达到真正的“无为而无不为”，这才是控制的最高境界。&lt;/strong&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;由此也可以看出，通过简单规则对社群进行控制，与“去中心化”组织的核心是一致的。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p label=&quot;小标题&quot; class=&quot;text-sm-title&quot;&gt;2、如何设定“简单规则”&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;从蚂蚁觅食活动中我们可以看出，“简单规则”对于社群来说，本质上是一套社群活动的流程与方法。它不同于群规，也不同于繁复的互动技巧。它是社群活动的一套基本机制，具有以下鲜明的特点，我们在设定规则时也必须遵循这些特点：&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;A、“简单规则”是每个成员都必须执行的&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;在蚂蚁觅食中，每个蚂蚁都必须遵循觅食规则，才能最终找到最短路径。在社群活动中，每个成员也必须遵循“简单规则”，才能达成社群目的，涌现巨大价值。&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;B、“简单规则”是每个成员都很清楚的&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;蚂蚁对觅食规则是本能反应，“简单规则”也必须内化到每个成员的思维中，成为思维和行动的习惯。每个成员不但要清楚，而且是条件反射式地做出反应。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;C、“简单规则”必须可衡量、可记录&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;顾名思义，“简单规则”必须简单清晰，群成员在执行时，能够方便被衡量和记录，到底是遵循了还是违背了规则。蚂蚁的觅食规则就是简单可衡量、清晰可记录的，毕竟对于有没有发现食物并折返&lt;span class=&quot;text-remarks&quot; label=&quot;备注&quot;&gt;（是否执行了规则）&lt;/span&gt;，所有的蚂蚁都可以立即做出判断。&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;而诸如“每个成员都要有良好的意愿”，“每个人都要凭良心行事”等，这就不是可衡量可记录的规则。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;D、“简单规则”应具有互动性&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;蚂蚁通过释放信息素达到互动，社群的“简单规则”也应该能够促使群成员达成互动，传递信息，交流想法，表达情绪等等。在这种相互作用下才能实现目的，涌现价值。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;E、“简单规则”应保证每个成员的独立性&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;蚂蚁在觅食活动中，并没有一个发号施令的leader。在社群中，单个成员在执行简单规则表达想法、做出行动时，也必须是独立的，而不应受制于群内的KOL。这样才能保证涌现出来的价值具有无限性、多样性。&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;因此，我所说的“简单规则”，与所谓的群规有着本质的区别：&lt;/strong&gt;&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;群规是针对群成员的限制性准则，它规定群成员“该做什么不该做什么”，类似于一个企业中的员工手册；&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;“简单规则”是社群的流程性保证，它指导群成员“先做什么后做什么”，类似于一个企业中某项工作任务的具体流程。&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;在一个社群中，不准闲聊、不准打广告，这是群规；每个群成员必须在特定时间内完成某个任务，并对任务作出评价，以甄选最优答案，这是规则。&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;相比之下，规则比群规对于社群的成败起着更为关键的作用。规则是群成员的发言机制、行动指南，是促成群成员自组织自运行的动力，是社群生产内容和产品、创造价值等的根本方法和基础模式。&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img style=&quot;max-width:100%;height:auto;&quot; id=&quot;loading_inh4gdn5&quot; src=&quot;http://images.huxiu.com/article/content/201604/26/1539124302.jpg?imageMogr2/strip/interlace/1/quality/85/format/jpg&quot; title=&quot;&quot; alt=&quot;660586028572239636.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;总之，社群必须通过控制才能实现目的，而“简单规则”则是社群实现控制的手段。无论是入群门槛、群规，还是互动技巧等等，它们都是无关乎根本的一些辅助运营技巧，真正决定社群成败的，是其内在的运作机制，即“简单规则”。&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p label=&quot;大标题&quot; class=&quot;text-big-title&quot;&gt;五、评判社群好坏的四个具体维度&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;通过前文的分析，我们知道了，能够更好地完成社群目的的社群才是个好社群，这是评判社群好坏的唯一标准。&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;要想更好地完成社群目的，我们必须对社群进行控制。但是这种控制不是强制性的，而是通过一套“简单规则”，群成员形成自组织自运行，社群能够自我维持。如此，社群方能涌现出群体智能，创造巨大的价值。&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;我们把这个标准进行拆分，于是便得到了以下四个具体的评判维度：&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;ul class=&quot; list-paddingleft-2&quot;&gt;&lt;li&gt;&lt;p&gt;是否有一个一致认同的共同目的&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;是否实现了对社群的有效控制&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;是否有一套简单可执行的规则&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;是否实现了社群运转的自组织和高质量&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;br/&gt;这四个维度使社群主在评判一个社群时，可以做到客观有效、真实可行。如果我们对一个社群的好坏有了把握，那在今后的社群运营中将变得更加的有针对性和有方向感。一句话，它能让我们做到心中有数。&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;事实上，社群就像一个微型企业。企业有自己的发展目标，并且有一套工作流程。它既能让企业有序运转，又能促进员工间的有效配合和能力发挥，是一个企业发展的基本模式；&lt;br/&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;社群则通过内容、门槛、群规等将成员连接在一起，在此基础上涌现出了社群目的，并通过控制来实现社群目的。由此便自然而然产生了一套“简单规则”，它既能保证社群的有序，又能促使群成员释放能量，创造价值，让社群真正持续发展，发挥巨大威力！&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;text-remarks&quot; label=&quot;备注&quot;&gt;作者简介：Richard，群幂负责人，系列创业者，MIT Sloan MBA，原考拉FM CTO，个人微信：yichaocui。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;c2&quot;&gt;*文章为作者独立观点，不代表虎嗅网立场&lt;br/&gt;&lt;/span&gt; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;本文由 &lt;a href=&quot;http://www.huxiu.com/member/1436083.html&quot; target=&quot;_blank&quot;&gt;群幂Richard&lt;/a&gt; 授权 &lt;a href=&quot;http://www.huxiu.com/&quot;&gt;虎嗅网&lt;/a&gt; 发表，并经虎嗅网编辑。转载此文章须经作者同意，并请附上出处(&lt;a href=&quot;http://www.huxiu.com/&quot;&gt;虎嗅网&lt;/a&gt;)及本页链接。原文链接http://www.huxiu.com/article/146829/1.html&lt;br/&gt; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/p&gt;&lt;p&gt;关注微信公众号虎嗅网（huxiu_com），定时推送，福利互动精彩多 &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '33', '1461738030', '1461738030', '1', '1', '0', '1', '0', '1', '0');
INSERT INTO `sys_article` VALUES ('12', '为什么说Facebook与百度正在快速成为好友', '猎豹', '', '一位来自猎豹的人士说，Facebook能够讨好到谷歌平台上一些最大的安卓开发商，部份原因是Facebook给了他们更多的关注。“而谷歌则尽量避免不要让这种关系变得暧昧，因为它在我们与其他开发者之间，确实不好选择，它需要一碗水端平。”这个人士说。', '2016-04-27/57205b12a5313.jpg', '&lt;p&gt;Facebook在中国仍然是被禁用的，但这家公司拥有一个强大的工具让它与广大中国应用开发者联系更紧密，也就是它的移动广告联盟。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;中国的百度、猎豹移动、APUS（雨燕）都已悄悄成为Facebook广告联盟里最大的卖家。无数应用——从移动游戏“别踩白块儿”到帮助用户省电的工具应用，都通过Facebook这个联盟在中国以外的市场挣钱。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;Facebook系统帮中国应用与全球广告商实现匹配，从而可以在Facebook自己的应用之外去进行广告投放。一般来说，应用与Facebook从这个广告网络收入里分成比例为七三开。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;这对中国应用来说是颇有意义的一笔收入。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p label=&quot;大标题&quot; class=&quot;text-big-title&quot;&gt;大玩家百度加入&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;据\r\n消息接近人士说，百度去年才开始加入Facebook的广告网络，但是现在已是在上面最赚钱的公司之一。据百度全球业务部国际业务发展部总监\r\nRichard \r\nLee说，通过Facebook广告网络，百度每天入账10万美元。他补充道，百度同样也加入了谷歌的AdMob联盟与InMobi广告联盟，但是“目前\r\n为止，Facebook是我们在货币化方面最重要的伙伴”，因为这里的分成比例是最高的。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;为了加强这个关\r\n系，Richard Lee说，百度总裁张亚勤在这个月的F8开发者大会上与Facebook \r\nCOO桑德伯格与其他Facebook高管进行了会谈。两家公司讨论了如何进一步的合作，包括如何让更多的中国中小开发者来使用Facebook的移动广\r\n告网络，即Facebook Audience Network。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;“Facebook非常积极，”Lee说道，“中国排名前50的开发商都被邀请去参加了F8，我在那会上看到许多来自中国的熟悉面孔。”&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;广告网络只是Facebook加强它与中国联系的一个角度，Facebook还在努力发展它的中国广告客户，后者在Facebook与Instagram上大打广告以获取更多的国际用户——今年1月时，桑德伯格曾在分析师会上这么说。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;据说，Facebook在即将在北京举办的GMIC上有重要亮相，以吸引数百上千名中国移动开发者的关注。Facebook广告技术的负责人，David Jakubowski会发表演讲。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p label=&quot;大标题&quot; class=&quot;text-big-title&quot;&gt;从赚开发者的钱到帮开发者赚钱&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;一个接近Facebook的人士说，当中国开发者寻求海外收入时，他们就会找到广告联盟，这拨人正在成为该服务的最大收入来源。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;一个早期的淘金者是猎豹，现在拥有超过5亿的移动用户。因为猎豹2014年上市时，也正是Facebook这个移动广告网络启航之时，所以猎豹是头一批与Facebook深度合作的公司，它也成为Audience Network上最大的淘金者。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;移动广告效果监测平台、也是Facebook的合作伙伴AppsFlyer的亚洲副主席Ronen Mense说，随着全球越来越多人联网，现在更多的中国应用开发者正在争抢海外用户。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;一\r\n些中国开发者在Facebook上进行了广告投放以推动应用下载，一些开发者还投放了积分墙以获取用户。“现金很快就消耗光了，开发者们需要看到投资回\r\n报，许多公司都开始货币化。这时，Facebook的Audience \r\nNetwork、网络广告联盟与谷歌就成为这个计划的一部分，”Mense说，“这恰好走完了一圈——Facebook一开始从开发者那挣钱，现在又把钱\r\n返回给开发者。”&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;百度的Lee补充道，百度与其他开发者一直在上海跟香港与Facebook员工一起工作，看如何优化它们对Audience Network的使用。但是Facebook在上海及其他中国城市都没有正式办公室，上周才在马尼拉新开了间办公室以增强亚洲力量。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;Mense认为，由于Facebook已吸引了一些最重要的玩家入局，所以它现在对更小的开发者来说，吸引力还不错。在中国，百度聚集了数以亿计的用户，“人人都会追随领导者，如果这事对百度有足够的好处，那么对其他人也会是一样。”&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p label=&quot;大标题&quot; class=&quot;text-big-title&quot;&gt;讨好中国&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;百度的Lee进一步建议，这两家公司应该合作起来，帮助Facebook进入中国市场，尽管这事不可能在短期内就见大的成效。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;Facebook\r\n \r\nCEO马克·扎克伯格向中国政府高层示好、苦学普通话、还有在天安门前晨跑登上中国媒体头条，诸如此类，都彰显出这家公司期望能正式进入中国市场。这可能\r\n会是一条漫长的路，因为中国政府认为社交网络可能会带来政治上的不稳定。Facebook去争取中国应用开发者的支持，更多的还是出于中短期收入考虑，这\r\n也将它置于与谷歌的另一场竞争中。谷歌尽管从中国撤出，但是在北京还有办公室，而且也在试图讨中国开发者欢心。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;一位来自猎豹的人士说，Facebook能够讨好到谷歌平台上一些最大的安卓开发商，部份原因是Facebook给了他们更多的关注。“而谷歌则尽量避免不要让这种关系变得暧昧，因为它在我们与其他开发者之间，确实不好选择，它需要一碗水端平。”这个人士说。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p label=&quot;大标题&quot; class=&quot;text-big-title&quot;&gt;Audience Network正变得更加重要&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;Facebook获取到了中国的高端客户，Facebook试图用这事反过来激发起美国本土公司对它的支持以将收入多元化。现在其Audience Network的美国本土客户包括“赫芬顿邮报”与卡戴珊姐妹的移动游戏。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;到\r\n2015年第四季度，Audience \r\nNetwork实现了10亿美元收入，也就是说Facebook挣了3亿美元。Facebook在第四季度移动广告上的收入是45亿美元，所以这3亿美元\r\n还是一个相对小的数字，但是Audience \r\nNetwork正在成为Facebook广告军火库一个越来越重要的部分。它能让Facebook不需要向它自己的应用里推送更多的广告就能赚到更多的\r\n钱。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;值得一提的是，Facebook最近停止了它在DSP广告上的开发。而Audience Network，源于Facebook内部，则以与应用低调融合的方式推送广告——可以瞄准那些把自己真实信息透露给社交网络的用户。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '33', '1461738274', '1461738274', '1', '1', '0', '1', '0', '1', '0');
INSERT INTO `sys_article` VALUES ('13', '让奥巴马、默多克都试戴的这款VR眼镜，什么来头？', 'VR', '', '这之后，PMD与Inifeon之间合作开发3D影响感测技术至今，设计了REAL3 3D图像传感器芯片，并联手参与到了谷歌的Tango项目中。Tango项目希通过来自传感器和摄像头的数据将人类的视觉带入移动设备之中', '2016-04-27/57205b7feb13e.jpg', '&lt;p&gt;其实，这只VR眼镜并不像Oculus Rift或者HTC Vive那么先进，它只比之前谷歌发布的Cardboard稍微复杂一点点。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;这只得到了奥巴马及默克尔青睐的VR眼镜由易福门电子（IFM Electronic）生产，据白宫的新闻稿透露，这款VR眼镜采用了和Cardboard一样的光学系统，以手机屏幕作为显示屏展示3D视图，单比Cardboard多一个内置sensor。内置的“世界上最小的3D相机”可以收录用户的手部热度信息并投在屏幕。该VR设备准备在2016年的下半年推出，可以连接到智能手机。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;简单来说，这个设备可以追踪用户的手部信息：&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;img-center-box&quot; style=&quot;display:block;&quot;&gt;&lt;img style=&quot;max-width:100%;height:auto;&quot; id=&quot;loading_inh3kcfm&quot; src=&quot;http://images.huxiu.com/article/content/201604/26/1514370756.png?imageMogr2/strip/interlace/1/quality/85/format/png&quot; title=&quot;&quot;/&gt;&lt;/span&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;实际上，IFM电子是PMD科技附属公司，而PMD科技的主要研究方向为3D技术及手部交互。PMD科技创立于2002年，是西根大学传感器系统中心的一个衍生公司。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;2012年底，Leap Motion在当年5月推出了口香糖大小的手势交互产品Leap而出名，它能够创造出约0.11平方米的空间，在这个空间里，Leap可以捕捉到用户10个手指发出的动作，而误差只在1/100毫米以内，据称它比当时的技术还要再精准200倍。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;img-center-box&quot; style=&quot;display:block;&quot;&gt;&lt;img style=&quot;max-width:100%;height:auto;&quot; id=&quot;loading_inh2h3ak&quot; src=&quot;http://images.huxiu.com/article/content/201604/26/1443527040.png?imageMogr2/strip/interlace/1/quality/85/format/png&quot; title=&quot;&quot;/&gt;&lt;/span&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;之后2013年初，PMD科技与Inifeon（英飞凌）共同生产了一款3D手势交互设备，名为CamBoard Pico，用法和Leap类似。该公司的发言人也颇有信心的表示其产品精敏度超过Leap，公司竞争力超过Leap Motion。这款设备基于 PMD的动态手势辨识技术识别手势，比如下图就展示了它的一种用途。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://images.huxiu.com/article/content/201604/26/1452476065.jpg?imageMogr2/strip/interlace/1/quality/85/format/jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;随后，PMD和Inifeon再次合作生产了CamBoard Pico的姐妹产品CamBoard Pico S。PMD 主要负责主动式雷射扫描仪机构，提供飞时测距（time of flight）形成景深数据部分；Infineon 则负责 CMOS 集成电路制程的芯片制造，其中整合了智能型序列程序、矩阵调变信号驱动程序和数字 / 模拟转换器。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;这之后，PMD与Inifeon之间合作开发3D影响感测技术至今，设计了REAL3 3D图像传感器芯片，并联手参与到了谷歌的Tango项目中。Tango项目希通过来自传感器和摄像头的数据将人类的视觉带入移动设备之中。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;所以奥巴马与默多克的联手高调站台，好似代表着美方公司（谷歌）与德方公司（PMD、Inifeon）的合作。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;最后说下中国。今年来自中国的参展商约有630家，数量仅次于德国本土参展商。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;2015年时候，德国提出“工业4.0”、美国提出“工业互联网”，之后，中国提出了“中国制造2025”（即到2025年迈入制造强国行列）。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;但在去年的汉诺威工博会上，曾有中国与会者提出“中国制造正在被边缘化”，因为“中国制造在工业4.0的高科技展馆里找不到”以及“许多客户对中国制造不信任，不屑和发怵，很远看到中国的参展专区就止步了，好一点的是走马观花、匆匆走过，问他们是否有兴趣，他们只是笑而不答。”&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;今年在会上，由佛山市发起的中德工业城市联盟宣布成立，城市联盟包括11个中国城市以及7个德国城市。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '33', '1461738343', '1461738343', '1', '1', '0', '1', '0', '1', '1');
INSERT INTO `sys_article` VALUES ('14', '百度投资了哪些汽车交通领域公司？', '爱奇艺，百度', '', '流投入O2O领域， 但在汽车交通领域的投资来说，却一直属于落后和追赶者角色。回顾过去三年百度在汽车交通领域的投资，车事儿兄认为，无人驾驶领域前景广阔但技术难度过于艰 巨，百度面临破局。除了押注无人车，在其他的汽', '2016-04-27/57205baa95bc5.jpg', '&lt;p&gt;“除了连接人和信息，还要连接人和服务”。这是百度近年来强调的战略重点。过去三年间，百度也效仿腾讯和阿里巴巴，手握大量现金流投入O2O领域，\r\n但在汽车交通领域的投资来说，却一直属于落后和追赶者角色。回顾过去三年百度在汽车交通领域的投资，车事儿兄认为，无人驾驶领域前景广阔但技术难度过于艰\r\n巨，百度面临破局。除了押注无人车，在其他的汽车交通的投资布局上，百度投资的企业喜忧参半，正在上演生死时速。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p class=&quot;text-big-title&quot; label=&quot;大标题&quot;&gt;一、百度投资了哪些汽车交通领域公司？&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;以\r\n往在PC时代，百度的投资非常强势，例如在爱奇艺、91、糯米、去哪儿等企业上追求绝对控股。进入移动互联网时代后，百度的投资版图随着生态的建立，更加\r\n具有选择性。李彦宏也曾表示，在投资前“我会询问团队协同效应是什么。如果要投资，就得先达成合作。”在汽车领域的投资同样秉持这样的概念，给入口，给流\r\n量，共建生态，但是每家的遇到的境况却不尽相同。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;百度在汽车领域共有6项投资，相比于腾讯的18起，和阿里的13起，数量上并不多。从投资的细分领域看，交通出行占据了4起，二手车电商1起，汽车生活1起。投资的时间主要集中在2015年，相对于其他两个巨头，入局时间稍晚。&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;img/&gt;&lt;span class=&quot;img-center-box&quot; style=&quot;display:block;&quot;&gt;&lt;img style=&quot;max-width:100%;height:auto;&quot; id=&quot;loading_ingzlg77&quot; src=&quot;http://images.huxiu.com/article/content/201604/26/1323138477.jpg?imageMogr2/strip/interlace/1/quality/85/format/jpg&quot; title=&quot;&quot; alt=&quot;11.webp.jpg&quot;/&gt;&lt;/span&gt;&lt;br/&gt;&lt;/p&gt;&lt;p class=&quot;text-big-title&quot; label=&quot;大标题&quot;&gt;二、百度投资汽车交通领域公司分析&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p class=&quot;text-sm-title&quot; label=&quot;小标题&quot;&gt;1.汽车电商&lt;/p&gt;&lt;p&gt;&lt;strong&gt;&lt;br/&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;投资企业：优信集团&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;百\r\n度在汽车电商的布局，主要是押注在二手车电商。。随着目前我国汽车保有量达到1.72亿辆，而新车销售在08年“婴儿潮”后逐渐放缓，目前二手车和新车的\r\n销售比在1：4，和国外成熟市场的3：1，还有极大的增长空间。二手车还存在车源分散，一车一况等情况，所以还没有哪家垂直导流网站完成大一统。以往百度\r\n搜索收入来源基本上是教育，金融，医疗等行业瓜分。无论从流量上还是行业的体量二手车电商绝对是一片汪洋大海。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;对于二手车电商领域的布局，百度押注了业内的独角兽优信集团。优信集团于2011年成立，目前有3条业务线，一条是主打B2B模式的优信拍，还有一条是主打B2C模式的优信二手车，最后还有二手车的金融业务。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;百度于2015年3月参与了优信得C轮1.7亿美金的融资。几乎与此同时，优信二手车宣布上线。值得注意的是腾讯此前已经参与过优信的A轮融资。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;img/&gt;&lt;span class=&quot;img-center-box&quot; style=&quot;display:block;&quot;&gt;&lt;img style=&quot;max-width:100%;height:auto;&quot; id=&quot;loading_ingzm2cm&quot; src=&quot;http://images.huxiu.com/article/content/201604/26/1323427592.jpg?imageMogr2/strip/interlace/1/quality/85/format/jpg&quot; title=&quot;&quot; alt=&quot;12.jpg_看图王.web.jpg&quot;/&gt;&lt;/span&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;在二手车电商行业优信无疑是巨无霸，各个业务线的成绩斐然。B2B领域的优信拍在易观智库《中国二手车电子商务发展研究报告2015》中位列第二，占据27.9%的份额。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;随\r\n后重点力推的优信二手车，去年中国好声音决赛优信二手车以一则“上上上优信二手车”60秒3000万的广告打响了二手车电商广告大战。据悉，去年1年优信\r\n二手车在广告上花费达到5亿。其市场份额在艾瑞资讯的《2015H2中国二手车电子商务行业白皮书》中占据了To \r\nC市场的78.1%。在二手车金融这个领域，去年9月优信也和微众银行合作，正式推出了“付一半”的购车方案。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;最新关于优信得消息则是D轮大约4亿美金的融资传闻，总之对于百度来说，投资优信并不亏本，而且赚大了。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p class=&quot;text-sm-title&quot; label=&quot;小标题&quot;&gt;2.交通出行&lt;/p&gt;&lt;p&gt;&lt;strong&gt;&lt;br/&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;投资企业：Uber，51汽车，天天用车&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;目前的国内交通出行不仅是移动化的产物，也是一个巨大的O2O流量入口，还承载着共享经济的理念。对提升交通运转效率，缓解人车矛盾有着极大意义。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;与腾讯，阿里共同押注Lyft和滴滴不同。百度重心扑在了Uber身上，但同时也对国内的51用车，天天用车进行了投资。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;对于Uber的投资，其实百度分别投资了两次，第一次是对Uber的6亿美金的战略投资。Uber在经历的估值也水涨船高至700亿美元。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;img/&gt;&lt;span class=&quot;img-center-box&quot; style=&quot;display:block;&quot;&gt;&lt;img style=&quot;max-width:100%;height:auto;&quot; id=&quot;loading_ingzm9u5&quot; src=&quot;http://images.huxiu.com/article/content/201604/26/1323526152.jpg?imageMogr2/strip/interlace/1/quality/85/format/jpg&quot; title=&quot;&quot; alt=&quot;13.webp.jpg&quot;/&gt;&lt;/span&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;Uber作为出行的巨头，2009年从美国加利福尼亚起家后，迅速全球化，覆盖近60个国家，260个城市。但是挑战仍然巨大，除了在北美洲和澳洲地位相对稳固外，在其他国家都面临着相应的冲击，无论是政策层面还是当地的打车软件的竞争。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;img/&gt;&lt;span class=&quot;img-center-box&quot; style=&quot;display:block;&quot;&gt;&lt;img style=&quot;max-width:100%;height:auto;&quot; id=&quot;loading_ingzmeyx&quot; src=&quot;http://images.huxiu.com/article/content/201604/26/1323591295.jpg?imageMogr2/strip/interlace/1/quality/85/format/jpg&quot; title=&quot;&quot; alt=&quot;13.webp (1).jpg&quot;/&gt;&lt;/span&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;在\r\n中国Uber最大的对手就是滴滴出行，百度也投资了Uber在中国的子公司雾博中国，用以和滴滴抗衡。但去年在十亿美金的补贴下，Uber的市场份额并不\r\n占优。根据易观智库2015年11月发布的《2015年第3季度中国专车服务市场监测报告》显示， \r\n2015年第3季度，滴滴出行、Uber车分别占据83.2%、16.2%。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;img-center-box&quot; style=&quot;display:block;&quot;&gt;&lt;img style=&quot;max-width:100%;height:auto;&quot; id=&quot;loading_ingzmyvz&quot; src=&quot;http://images.huxiu.com/article/content/201604/26/1324248673.jpg?imageMogr2/strip/interlace/1/quality/85/format/jpg&quot; title=&quot;&quot; alt=&quot;14.webp.jpg&quot;/&gt;&lt;/span&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;Uber\r\n在中国的情况比较凶险，但是可以预见的是Uber超级强大的融资能力，能继续在市场中兴风作浪。但是百度投资的另外两家拼车类的出行企业，目前情况就不那\r\n么乐观了。51用车和友友用车都是以拼车起家，但是随着滴滴的入局，现在市场份额被压缩的很严重。根据易观数据报告，2015年第三季度滴滴顺风车占据了\r\n69.9%的市场份额，随后是嘀嗒拼车，天天用车和51汽车的市场份额被压到了个位数。基本上拼车市场形成了721的互联网格局。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;车事儿兄认为，&lt;strong&gt;百度希望通过投资海外的Uber，一起其他一些多样化的出行方式，实现自己在出行领域占据一席之地的策略，但其本身投入三心二意，也在重大决策中不占据太多话语权，因此，在出行这个领域，百度并不占据任何优势，甚至可以说全面落后&lt;/strong&gt;。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p class=&quot;text-sm-title&quot; label=&quot;小标题&quot;&gt;3.汽车生活&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;目\r\n前我国的汽车保有量达到了1.72亿量，已经进入了汽车社会。但与此同时汽车生活的配套服务，例如加油，停车，汽车交友，地图等还没有健全。百度在这块选\r\n择了用地图这个切口进入布局，于2013年收购芮图旗下的“道道通“获取千万量级的数据信息，提升整个产品入口的搜索体验。&lt;/p&gt;&lt;p&gt;而随后百度地图的表现也确实惊艳，易观的《2015Q3中国手机地图市场季度数据监测》中，百度地图占领70%的市场份额。地图业务延伸，后来百度也成立了LBS事业部。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;最近百度总裁张亚勤也宣布了百度用地图来进行国家化战略，其产品已经登陆亚太18个国家和地区，并计划将于2016年年底覆盖全球150多个国家和地区。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p class=&quot;text-sm-title&quot; label=&quot;小标题&quot;&gt;4.无人汽车&lt;br class=&quot;text-sm-title&quot; label=&quot;小标题&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;无\r\n人车是汽车驾驶上的一次“革命”，通过车载传感系统感知道路环境、自动规划行车路线并自主控制到达预定目标的交通工具。其中汽车和机电，人工智能的融合产\r\n物。最先发展无人车的是谷歌公司，BAT中技术基因最强的百度同样也押注到了人工智能领域的研究，而无人车也是百度的度深度研究院（IDL）的核心项目，\r\n是李彦宏期待“弯道超车”的押注。&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;img-center-box&quot; style=&quot;display:block;&quot;&gt;&lt;/span&gt;&lt;br/&gt;\r\n 百度无人车也不负众望，在去年12月成功从百度大厦到奥森公园完成了往返，其中最高时速达到了100公里/小时。而关心无人车的不止有李彦宏，去年在乌镇\r\n的互联网大会上，习总书记也对无人车非常有兴趣，原本停留3分钟，结果待了足足10分钟。无人车项目已经上升到国家战略意义的层面，不仅是人工智能领域，\r\n同时对汽车产业的推动也有积极重大作用。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;但是无人车目前发展还并非完全成熟，还面临着安全，法律，成本等一系列问\r\n题。百度的老大哥谷歌开发的无人车试验总里程超过100万英里（约160万公里），发生了14起车祸，最为严重的一次还出现了人员受伤。所以发展无人车这\r\n块，是个循序渐进的过程，虽然未来很可期，但还是要保持足够专注和耐心。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;对于百度在汽车交通领域的布局，可以看到无人车无疑是里面的明珠，对其他几家的投资也可圈可点，但都存在一定的风险。未来怎么走，除了看百度是否继续支持，企业发展最终还是要靠自己努力。&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '33', '1461738445', '1461738445', '1', '1', '0', '1', '0', '0', '0');
INSERT INTO `sys_article` VALUES ('15', 'VR电影很火? 短时间内难成一门好生意', 'HTC VIVE，电影院', '', '当 你戴上数千元的高端头盔后，没有低端设备那么明显的眩晕感，整体的视觉或许会让你眼前一亮，感觉这才是真正的VR电影体验。但加上高端电脑主机的价格，获 得一套高端消费级VR设备你或许会需要1-3万人民币，如果你是体验HTC VIVE，你甚至需要拥有一间单独的体验房间，这个价格和房间要求，让高端VR设备暂时缺乏普及的条件。这无论是对电影院的VR电影专场进行', '2016-04-27/57205c3e342ff.jpg', '&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/p&gt;&lt;p&gt;也许你很难想象得到，就在上周，笔者在长沙某地方电台竟然听到了关于VR的新闻。是的，在这样一座二线城市里，如果VR日报这类垂直新媒体全力关注VR，这是理所应当，但大众类媒体开始传播关于VR的信息，这不得不令人好奇：全国对VR已经拥有基本认知的国人究竟有多少？&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;为\r\n何要好奇这个？因为，如果说VR已经成功普及到大部分的普通大众身上，基于VR而开展游戏、影视等大众化娱乐需求也会迅速激增，整个产业生态也会以迅雷不\r\n及掩耳之势完善起来。事实上，在最近的1年内，在资本、媒体、创业者的共同努力下，大量VR内容商开始出现，VR影视在热度仅次于VR游戏。在这种情况\r\n下，VR影视究竟是不是虚火？VR+电影究竟是不是一门好生意呢？&lt;/p&gt;&lt;p&gt;&lt;br label=&quot;大标题&quot; class=&quot;text-big-title&quot;/&gt;&lt;/p&gt;&lt;p label=&quot;大标题&quot; class=&quot;text-big-title&quot;&gt;明星大厂纷纷入局VR电影 电影VR化备受关注&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;正\r\n是因为VR在最近一年内备受从业者和投资人的高度认可，从此前张艺谋宣布要拍摄VR视频，到后来郭敬明要将《幻城》也拍摄VR版本，明星不提提VR似乎都\r\n赶不上时髦了。伴随着越来越多成型的VR电影短片出现，越来越多的明星也开始将自己与VR电影扯上关系，明星们在电影VR化的过程长可谓是一群相当尽职的\r\n普及者。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;与此同时，大型电影发行商和电影制作公司也大力进军VR。近日，万达院线将迪斯尼旗下电影《奇幻森林》的\r\nVR片花带到全国40多家万达影城，试图通过VR片花这等尝鲜体验更好地吸引影迷关注VR。而在此前，《火星救援》在宣传推广中，曾发布了15-20分钟\r\n的VR短片供用户体验；NBA球星詹姆斯在圣诞期间，曾联手Oculus发布了12分钟的VR小电影《追求伟大》。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;当\r\n越来越多的国际知名大厂和明星入局VR，整个电影内容的VR化不受到行业人和观众们的关注，似乎都有些匪夷所思。但从目前的市场情况来看，VR电影的营销\r\n价值大于实际观影价值，无论是摆在台前的商业变现模式，还是放在台后的软硬件技术及人才储备，VR电影在短期之内都难以成为一门好生意，要真正带来人类电\r\n影变革，VR未来或许有这个实力，但不是现在。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p label=&quot;大标题&quot; class=&quot;text-big-title&quot;&gt;为什么说VR电影短时间内难成一门好生意呢？&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;为\r\n什么小谦会这样觉得呢？生意的本质离不开寻找目标消费者，离不开变现。关注VR电影的人或许是多了，但真正因为VR电影而买单的人有多少？为什么他们不愿\r\n意为现在的VR电影买单？VR电影在制作究竟是不是个高门槛的活?究竟什么样的VR电影才能深受消费者喜爱，甚至愿意为他单独买单？要真正能够解决这些难\r\n题,VR电影或许才能成为一门好生意。&lt;/p&gt;&lt;p&gt;&lt;br label=&quot;小标题&quot; class=&quot;text-sm-title&quot;/&gt;&lt;/p&gt;&lt;p label=&quot;小标题&quot; class=&quot;text-sm-title&quot;&gt;1、什么是观众最喜爱的VR电影体验？摸索期不短！&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;如同游戏产业一般，究竟怎么把VR和电影结合在一起给观众带来最合适的VR电影体验，这是个难题。变革从来不是一天两天就会突然发生，没有标杆的VR影视案例，现有的电影制作方式会否会让当下的VR电影大有制作局限，形式而高于内容本质呢？&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;从\r\n大方向来说，拥有更多维度和更多感觉来表达电影故事的情节，的确能够更为细致得表达故事，让广大观影人士可以更大程度地实现身临其境，大大增强电影的代入\r\n感。但在现在来说，一方面是在VR制作领域，制作人员习惯了单个维度的电影拍摄，当前的制作思路要让电影制作人员毫无违和感地在消费者后方、左侧、右侧也\r\n做出场景出来，需要一段摸索期；另一方面，无论是用手机电脑观影，还是走进电影院带上3D眼镜，消费者目前早已习惯以接近静止的状态观看电影，如果VR电\r\n影需要让观众们一改此前的观影习惯，站立起来观影，时常将身体往左侧/右侧转动观影，甚至还要回过头去看看身后是否有更为精彩的电影内容，且不说制作方怎\r\n么解决这类体验的消费难题，要让消费者改变此前的观影习惯，这不会是一个短期工程。&lt;/p&gt;&lt;p&gt;&lt;br label=&quot;小标题&quot; class=&quot;text-sm-title&quot;/&gt;&lt;/p&gt;&lt;p label=&quot;小标题&quot; class=&quot;text-sm-title&quot;&gt;2、VR电影怎么赚钱？商业模式比VR游戏都不清晰&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;除却在体验上会令制作人员和观影人群都带来不便以外，VR电影要怎么赚钱？在上述的那些VR电影案例中，大家把VR电影更多地应用在常规电影的营销宣传上，VR电影并没有完完全全成为一个独立的消费产品。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;按理来说，在当前VR的发展状态中，商业模式是所有VR从业者共有的心病。但就拿游戏来举例，目前在steam上已经出现单款卖出20万套的VR游戏，专业的游戏平台和本身就已经成型的消费群体，让消费者能够独立地为VR游戏而买单，但VR电影显然还不行。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;在\r\n市场中，VR电影以一次性消费为主，VR游戏则以深度运营后的多次消费为主。坦诚地说，当前VR游戏主要依靠玩家以购买单机碟片一般的方式获取收入，游戏\r\n内购模式暂时没能走通，手游和端游领域既有的商业模式还未能在VR游戏领域完全移植过去，新的商业模式也未衍生出来，但这也比电影强呀！VR电影是目前热\r\n度仅次于VR游戏的VR内容，但目前更多地用在了营销推广上，他目前如果都只是一个辅助内容，又怎么寻找一个可持续性的多元化商业模式呢？&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p label=&quot;小标题&quot; class=&quot;text-sm-title&quot;&gt;3、技术困境 低端硬件体验差 高端硬件消费没条件&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;除此以外，一方面，在VR电影拍摄方面，由于当前产业过猛发展，优质的专业级拍摄工具需求紧缺，且价格居高不下，这就直接导致VR电影的制作成本居高不下。不少时常仅为10余分钟的电影都有可能耗资数百万。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;而另一方面，电影是一种大众类需求，而观看VR电影，暂时必须要佩戴VR设备。在当前的市场中，笔者个人认为低端硬件体验差，高端硬件消费没条件。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;为何这么说？市场上数十元的VR设备比比皆是，但其给人带来的体验却有点像伪3D，高成本的VR电影用低端电影观看的效果，有可能都会因为设备的问题而砸了VR电影的招牌。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;当\r\n你戴上数千元的高端头盔后，没有低端设备那么明显的眩晕感，整体的视觉或许会让你眼前一亮，感觉这才是真正的VR电影体验。但加上高端电脑主机的价格，获\r\n得一套高端消费级VR设备你或许会需要1-3万人民币，如果你是体验HTC \r\nVIVE，你甚至需要拥有一间单独的体验房间，这个价格和房间要求，让高端VR设备暂时缺乏普及的条件。这无论是对电影院的VR电影专场进行专场改造，还\r\n是要让消费者能够在家消费VR电影，都带来了巨大的阻碍。&lt;/p&gt;&lt;p&gt;&lt;br label=&quot;小标题&quot; class=&quot;text-sm-title&quot;/&gt;&lt;/p&gt;&lt;p label=&quot;小标题&quot; class=&quot;text-sm-title&quot;&gt;4、人才困境 人才生态完全跟不上产业发展速度&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;每一个产业的发展都离不开人才，VR目前被行业炒作得太火，VR影视作为第二大VR内容领域，尽管关注者很多。但由于VR电影整个产业此前底蕴不足，哪怕是此前专业的动漫制作或者电影拍摄人员，面对全新的软件和硬件，也需要花费不少的时间进行学习。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;VR产业突然在中国爆火，缺乏大批量能够培训新人的精英人才，人才生态难以为整个产业生态做出巨大贡献，没有大量优质的人才，怎么按时推出VR电影？怎么缩减VR电影的拍摄制作成本？&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;总\r\n体来说，VR电影目前所面临的问题不少。在未来，当技术问题和产业生态问题都随着时间推移而解决后，VR电影会成为大众需求内容，但在最近几年来说，技术\r\n问题和产业问题都解决不了，没有一个清晰的商业模式，整个VR内容产业的资源也会往其他商业模式更为清晰的VR内容领域倾斜，这样一来，VR电影要解决产\r\n业生态的问题，便是遥遥无期了。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '33', '1461738562', '1461738562', '1', '1', '0', '1', '0', '0', '0');
INSERT INTO `sys_article` VALUES ('16', '新浪微盘关闭在即，网盘到底犯了什么错？', '测试，百度', 'rving房车网', '虎嗅做了简单的搜索测试，想试试看微盘里究竟有什么东西值得被整改，但无奈没有交保护费的虎嗅已经完全无法使用搜索功能了。', '', '&lt;p&gt;虎嗅做了简单的搜索测试，想试试看微盘里究竟有什么东西值得被整改，但无奈没有交保护费的虎嗅已经完全无法使用搜索功能了。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;img-center-box&quot; style=&quot;display:block;&quot;&gt;&lt;img style=&quot;max-width:100%;height:auto;&quot; id=&quot;loading_infkgcto&quot; src=&quot;http://images.huxiu.com/article/content/201604/25/1332032327.jpg?imageMogr2/strip/interlace/1/quality/85/format/jpg&quot; title=&quot;&quot;/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p class=&quot;text-big-title&quot; label=&quot;大标题&quot;&gt;新浪微盘里都有什么？&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;关闭的理由很是清晰，因为要配合监管部门的整改，那究竟是什么需要被整改？&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;这要从新浪爱问说起。曾经，丰富的（盗版）电子书资源就让新浪爱问共享资料产生了一定的用户粘性，但新浪爱问的资源近年来已经被经过多轮整治后几乎完全找不到“资料”后，新浪爱问也失去了原有的用户地位，此时新浪微盘改头换面承担了这部分“资料”共享的任务。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;img-center-box&quot; style=&quot;display:block;&quot;&gt;&lt;img style=&quot;max-width:100%;height:auto;&quot; id=&quot;loading_infklwu5&quot; src=&quot;http://images.huxiu.com/article/content/201604/25/1336220295.jpg?imageMogr2/strip/interlace/1/quality/85/format/jpg&quot; title=&quot;&quot;/&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;原先新浪爱问中的资源，以及微博中用户的上传与分享，加上对搜索引擎的宽容，使得在新浪微盘中挖掘奇奇怪怪的内容轻而易举——百度搜索屏蔽了自家百度云，反而能从微盘中搜出文件来，如果配合什么神秘代码与车牌号，新浪微盘这简直是个大“车库”，什么文件电子书电影小电影，不要太简单。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;甚至在新浪自家关了搜索以后，用百度神秘代码“&lt;strong&gt;关键词 + site:vdisk.weibo.com&lt;/strong&gt;&amp;quot;依然可以搜出新浪微盘里被分享过的内容&lt;span label=&quot;备注&quot; class=&quot;text-remarks&quot;&gt;#不要说是我告诉你的#&lt;/span&gt;。现在，好奇的围观群众你们可以去挖一下新浪微盘里都藏了些什么宝藏了。&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;span class=&quot;img-center-box&quot; style=&quot;display:block;&quot;&gt;&lt;img style=&quot;max-width:100%;height:auto;&quot; id=&quot;loading_infky8xi&quot; src=&quot;http://images.huxiu.com/article/content/201604/25/1345570076.jpg?imageMogr2/strip/interlace/1/quality/85/format/jpg&quot; title=&quot;&quot;/&gt;&lt;/span&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;如果新浪爱问即面临版权和限制内容等影响，外加上述所说一不小心就会成为神秘资源聚集地，那微盘遭到整改也是情理之中。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p class=&quot;text-big-title&quot; label=&quot;大标题&quot;&gt;微盘既不是第一个被关闭的云存储，也不会是最后一个&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;网盘，最早出现于邮箱服务中的个人存储空间，用于临时放置文件或共享等。由于文件分享和随着移动互联网、多设备文件共享等用户刚需，独立的大容量网盘便成了必然。&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;自2014年整治互联网环境以来，网络存储就是监管的重点照顾对象之一，受限于用户上传内容的不可控性，对网盘内容的审查与监管成了技术上的老大难问题，早期的网盘，比如115或酷盘等，在多次整改限制后，如115几乎完全禁止了用户间分享文件后，现在几乎已经成了空壳，成为了真正只能供付费用户存放文件的网络硬盘。得益于较强技术实力下对违禁内容的识别，目前仅有百度盘情况略好一些，但当年整改时百度盘中大量的文件遭删除清理的现象依然让用户怨声载道。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;怨声载道的用户背后是用户对免费资源无穷尽的追求。在这样的思路下，任何一个满足基本使用条件的文件分享系统——网盘、论坛、网站、种子与磁力链，都会成为一时的爆款，例如新浪爱问和新浪微盘，也比如bilibili试图正版化后和视频站疯抢资源以后出现的dilidili等山寨网站，甚至死而未僵的内容分享论坛，归根结底，只是这样一个问题：获取免费资源操作上的便利性——直接播放最方便，也最容易被整治；网盘分享次之，直接搜索并下载对用户来说也不会是负担；论坛或种子就更复杂一些，搜索与回复甚至积分等都是门槛。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;在这样的环境下，新浪微盘被关闭了，还会有新的xx盘或者旧的百度盘继续顶上的。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p class=&quot;text-big-title&quot; label=&quot;大标题&quot;&gt;关闭微盘，顺手立了个牌坊的新浪&lt;/p&gt;&lt;p class=&quot;text-big-title&quot; label=&quot;大标题&quot;&gt;&lt;br/&gt;&lt;/p&gt;&lt;p class=&quot;text-normal&quot; label=&quot;正文&quot;&gt;最后，我们来看一下新浪微盘在微博上的通告，通告中顺手@了一众提供各类资源的微博大号，用来稍微弥补一下被关闭的微盘中再也找不到的好用的”资料“们。现在，我们只能好心地希望这些大号提供的都是正版资料了，但到底是不是，我不说。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', '33', '1461738661', '1461738661', '1', '1', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `sys_attr`
-- ----------------------------
DROP TABLE IF EXISTS `sys_attr`;
CREATE TABLE `sys_attr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoryid` int(11) DEFAULT NULL,
  `type` enum('checkbox','radio','textarea','linkage','text') DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_attr
-- ----------------------------
INSERT INTO `sys_attr` VALUES ('5', '36', 'checkbox', '系统参数', '50');
INSERT INTO `sys_attr` VALUES ('6', '33', 'checkbox', '车子演示', '50');
INSERT INTO `sys_attr` VALUES ('7', '38', 'radio', '汽车驱动', '50');

-- ----------------------------
-- Table structure for `sys_attr_option`
-- ----------------------------
DROP TABLE IF EXISTS `sys_attr_option`;
CREATE TABLE `sys_attr_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attid` int(11) DEFAULT NULL,
  `value` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_attr_option
-- ----------------------------
INSERT INTO `sys_attr_option` VALUES ('4', '6', '红色');
INSERT INTO `sys_attr_option` VALUES ('5', '6', '黑色');
INSERT INTO `sys_attr_option` VALUES ('6', '6', '白色');
INSERT INTO `sys_attr_option` VALUES ('7', '7', '四驱');
INSERT INTO `sys_attr_option` VALUES ('8', '7', '两驱');
INSERT INTO `sys_attr_option` VALUES ('21', '5', '9999');

-- ----------------------------
-- Table structure for `sys_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `sys_auth_group`;
CREATE TABLE `sys_auth_group` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_auth_group
-- ----------------------------
INSERT INTO `sys_auth_group` VALUES ('41', '编辑组', '1', '1,2,3,53,58,59,60,54,61,62,63,64,55,65,66,56', '1461319543');
INSERT INTO `sys_auth_group` VALUES ('1', '超级管理员', '1', '1,2,3,53,54,57,55,56', '1461318997');

-- ----------------------------
-- Table structure for `sys_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `sys_auth_group_access`;
CREATE TABLE `sys_auth_group_access` (
  `uid` smallint(5) unsigned NOT NULL,
  `group_id` smallint(5) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_auth_group_access
-- ----------------------------
INSERT INTO `sys_auth_group_access` VALUES ('1', '1');
INSERT INTO `sys_auth_group_access` VALUES ('4', '41');

-- ----------------------------
-- Table structure for `sys_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `sys_auth_rule`;
CREATE TABLE `sys_auth_rule` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(80) NOT NULL DEFAULT '',
  `pid` smallint(5) NOT NULL COMMENT '父级ID',
  `sort` tinyint(4) NOT NULL DEFAULT '50' COMMENT '排序',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `icon` varchar(30) DEFAULT NULL,
  `isshow` int(11) DEFAULT '1',
  `condition` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_auth_rule
-- ----------------------------
INSERT INTO `sys_auth_rule` VALUES ('1', '系统主页', 'Index/mainInfo', '0', '1', '1461304352', 'fa fa-home', '1', null);
INSERT INTO `sys_auth_rule` VALUES ('2', '相关设置', '', '0', '4', '1461304352', 'fa fa-cogs', '1', null);
INSERT INTO `sys_auth_rule` VALUES ('53', '管理员列表', 'Auth/adminList', '3', '50', '1461304669', '', '1', null);
INSERT INTO `sys_auth_rule` VALUES ('3', '管理员设置', '', '0', '3', '1461304352', 'fa fa-user', '1', null);
INSERT INTO `sys_auth_rule` VALUES ('54', '用户组', 'Auth/groupList', '3', '50', '1461304729', '', '1', null);
INSERT INTO `sys_auth_rule` VALUES ('55', '权限菜单', 'Auth/Index', '3', '50', '1461304778', '', '1', null);
INSERT INTO `sys_auth_rule` VALUES ('56', '清除缓存', 'Index/cache_clean', '0', '5', '1461304841', 'fa fa-trash-o', '1', null);
INSERT INTO `sys_auth_rule` VALUES ('58', '添加用户', 'Auth/addUser', '53', '50', '1461328261', '', '0', null);
INSERT INTO `sys_auth_rule` VALUES ('59', '删除用户', 'Auth/delUser', '53', '50', '1461328291', '', '0', null);
INSERT INTO `sys_auth_rule` VALUES ('60', '禁用用户', 'Auth/disableUser', '53', '50', '1461328321', '', '1', null);
INSERT INTO `sys_auth_rule` VALUES ('61', '添加用户组', 'Auth/addGroup', '54', '50', '1461328357', '', '0', null);
INSERT INTO `sys_auth_rule` VALUES ('62', '编辑用户组', 'Auth/editGroup', '54', '50', '1461328386', '', '0', null);
INSERT INTO `sys_auth_rule` VALUES ('63', '删除用户组', 'Auth/delGroup', '54', '50', '1461328412', '', '1', null);
INSERT INTO `sys_auth_rule` VALUES ('64', 'ajax分组列表', 'Auth/getGroupList', '54', '50', '1461328477', '', '1', null);
INSERT INTO `sys_auth_rule` VALUES ('65', '添加菜单', 'Auth/addMenu', '55', '50', '1461328543', '', '0', null);
INSERT INTO `sys_auth_rule` VALUES ('66', '删除菜单', 'Auth/delMenu', '55', '50', '1461328598', '', '0', null);
INSERT INTO `sys_auth_rule` VALUES ('68', '站点设置', 'Index/siteSetting', '2', '50', '1461462374', '', '1', null);
INSERT INTO `sys_auth_rule` VALUES ('69', '修改密码', 'Index/changePassword', '2', '50', '1461480464', '', '1', null);
INSERT INTO `sys_auth_rule` VALUES ('70', '内容管理', '', '0', '2', '1461483373', 'fa fa-file-text-o', '1', null);
INSERT INTO `sys_auth_rule` VALUES ('71', '菜单排序', 'Auth/order', '55', '50', '1461484870', '', '1', null);
INSERT INTO `sys_auth_rule` VALUES ('72', '分类管理', 'Content/Category', '70', '50', '1461489204', '', '1', null);
INSERT INTO `sys_auth_rule` VALUES ('73', '分类列表', 'Content/Category', '72', '50', '1461490620', '', '0', null);
INSERT INTO `sys_auth_rule` VALUES ('74', '添加分类', 'Content/addCategory', '72', '50', '1461490663', '', '0', null);
INSERT INTO `sys_auth_rule` VALUES ('75', 'ajax获取分类信息', 'Content/editCategory', '72', '50', '1461490700', '', '0', null);
INSERT INTO `sys_auth_rule` VALUES ('76', '编辑分类', 'Content/editCategoryMethod', '72', '50', '1461490794', '', '0', null);
INSERT INTO `sys_auth_rule` VALUES ('77', '删除分类', 'Content/delCategory', '72', '50', '1461490825', '', '1', null);
INSERT INTO `sys_auth_rule` VALUES ('78', 'ajax获取分类列表', 'Content/getCategory', '72', '50', '1461490859', '', '1', null);
INSERT INTO `sys_auth_rule` VALUES ('79', '文章管理', 'Article/index', '70', '50', '1461495525', '', '1', null);
INSERT INTO `sys_auth_rule` VALUES ('80', '添加文章', 'Article/addArticle', '79', '50', '1461642107', '', '0', null);
INSERT INTO `sys_auth_rule` VALUES ('81', '编辑文章', 'Article/editArticle', '79', '50', '1461642143', '', '0', null);
INSERT INTO `sys_auth_rule` VALUES ('82', '文章置顶', 'Article/istop', '79', '50', '1461642174', '', '0', null);
INSERT INTO `sys_auth_rule` VALUES ('83', '文章显示', 'Article/isshow', '79', '50', '1461642200', '', '0', null);
INSERT INTO `sys_auth_rule` VALUES ('84', '前台菜单', 'Content/MenuManage', '70', '50', '1461651299', '', '1', null);
INSERT INTO `sys_auth_rule` VALUES ('85', '添加菜单', 'Content/addMenu', '84', '50', '1461667066', '', '0', null);
INSERT INTO `sys_auth_rule` VALUES ('86', '编辑菜单', 'Content/editMenu', '84', '50', '1461667099', '', '0', null);
INSERT INTO `sys_auth_rule` VALUES ('87', '删除菜单', 'Content/delMenu', '84', '50', '1461667138', '', '0', null);
INSERT INTO `sys_auth_rule` VALUES ('88', '显示菜单', 'Content/isShowMenu', '84', '50', '1461667164', '', '0', null);
INSERT INTO `sys_auth_rule` VALUES ('89', '菜单排序', 'Content/order', '84', '50', '1461667208', '', '0', null);
INSERT INTO `sys_auth_rule` VALUES ('90', '删除文章', 'Article/delArticle', '79', '50', '1461722886', '', '1', null);
INSERT INTO `sys_auth_rule` VALUES ('91', '头像上传', 'Index/shearPhoto', '1', '50', '1462760398', '', '0', null);
INSERT INTO `sys_auth_rule` VALUES ('92', '附加属性', 'Content/attachedProperties', '70', '50', '1462766700', '', '1', null);
INSERT INTO `sys_auth_rule` VALUES ('93', '添加属性', 'Content/addAttr', '92', '50', '1462767272', '', '0', null);
INSERT INTO `sys_auth_rule` VALUES ('94', '联动菜单', 'Content/linkage', '70', '50', '1462785667', '', '1', null);
INSERT INTO `sys_auth_rule` VALUES ('95', '编辑属性', 'Content/editMenu', '92', '50', '1462787589', '', '0', null);
INSERT INTO `sys_auth_rule` VALUES ('96', '删除属性', 'Content/delAttr', '92', '50', '1462787623', '', '0', null);

-- ----------------------------
-- Table structure for `sys_category`
-- ----------------------------
DROP TABLE IF EXISTS `sys_category`;
CREATE TABLE `sys_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parentid` int(11) DEFAULT '0',
  `isshow` int(11) DEFAULT '0',
  `description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `categorytype` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of sys_category
-- ----------------------------
INSERT INTO `sys_category` VALUES ('33', '资讯', '0', '1', '文章', '文章', 'article');
INSERT INTO `sys_category` VALUES ('36', '图片', '0', '1', '图片', '图片', 'article');
INSERT INTO `sys_category` VALUES ('37', '车系', '0', '1', '车系', '车系', 'article');
INSERT INTO `sys_category` VALUES ('38', '报价', '0', '1', '报价', '报价', 'article');
INSERT INTO `sys_category` VALUES ('39', '导购', '0', '1', '导购', '导购', 'article');
INSERT INTO `sys_category` VALUES ('40', '装备', '0', '1', '装备', '装备', 'article');
INSERT INTO `sys_category` VALUES ('41', '营地', '0', '1', '营地', '营地', 'article');

-- ----------------------------
-- Table structure for `sys_linkage`
-- ----------------------------
DROP TABLE IF EXISTS `sys_linkage`;
CREATE TABLE `sys_linkage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parentid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of sys_linkage
-- ----------------------------
INSERT INTO `sys_linkage` VALUES ('54', '99999', '0');
INSERT INTO `sys_linkage` VALUES ('55', '8888', '54');
INSERT INTO `sys_linkage` VALUES ('56', '7777', '55');
INSERT INTO `sys_linkage` VALUES ('57', '77777999', '56');

-- ----------------------------
-- Table structure for `sys_menu`
-- ----------------------------
DROP TABLE IF EXISTS `sys_menu`;
CREATE TABLE `sys_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `ishref` int(11) DEFAULT '0' COMMENT '是否是第三方链接',
  `isshow` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_menu
-- ----------------------------
INSERT INTO `sys_menu` VALUES ('11', '资讯', 'info', '0', '0', '1', '1');
INSERT INTO `sys_menu` VALUES ('12', '图片', 'images', '0', '0', '1', '2');
INSERT INTO `sys_menu` VALUES ('13', '车系', 'series', '0', '0', '1', '3');
INSERT INTO `sys_menu` VALUES ('14', '报价', 'prices', '0', '0', '1', '4');
INSERT INTO `sys_menu` VALUES ('15', '导购', 'guide', '0', '0', '1', '5');
INSERT INTO `sys_menu` VALUES ('16', '装备', 'gears', '0', '0', '1', '6');
INSERT INTO `sys_menu` VALUES ('17', '营地', 'campgrounds', '0', '0', '1', '7');
INSERT INTO `sys_menu` VALUES ('18', '论坛', 'http://bbs.rving.com.cn', '0', '1', '1', '8');

-- ----------------------------
-- Table structure for `sys_site_setting`
-- ----------------------------
DROP TABLE IF EXISTS `sys_site_setting`;
CREATE TABLE `sys_site_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sitename` varchar(100) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` text,
  `isopen` int(11) DEFAULT '1' COMMENT '是否开启网站',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_site_setting
-- ----------------------------
INSERT INTO `sys_site_setting` VALUES ('1', '212121', '2333333333', '111111111111', '1');

-- ----------------------------
-- Table structure for `sys_user`
-- ----------------------------
DROP TABLE IF EXISTS `sys_user`;
CREATE TABLE `sys_user` (
  `id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(40) NOT NULL,
  `realname` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `last_login_time` int(11) DEFAULT NULL,
  `last_login_ip` varchar(40) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL COMMENT '头像',
  `is_manage` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_unique` (`username`) USING BTREE,
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='管理员数据表';

-- ----------------------------
-- Records of sys_user
-- ----------------------------
INSERT INTO `sys_user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '410202049@qq.com', '', '1', '1462762627', '127.0.0.1', 'avatar5730719d8adc8_108_name1.jpg', '1');
INSERT INTO `sys_user` VALUES ('4', 'kerry', '21232f297a57a5a743894a0e4a801fc3', '', '', '1', '1462263370', '127.0.0.1', null, '1');
