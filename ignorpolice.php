<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

$input = file_get_contents("php://input");
$json = json_decode($input, true);
//shell_exec('telegrambotreport "' . var_export($input, true) . '"');

$INLINE_RESULTS = array(
  array("type" => "photo", "id" => "000", "photo_url" => "https://imgur.com/a/d6lON3A", "thumb_url" => "https://imgur.com/a/d6lON3A"),
  array("type" => "sticker", "id" => "001", "sticker_file_id" => "CAACAgQAAxkBAAN9YNytwqXMWNNuNQZR2mGc0t-O-z0AAn0HAAK_FsFRmHpYaTLLvZ8gBA"),
  array("type" => "sticker", "id" => "002", "sticker_file_id" => "CAACAgIAAxkBAAOGYNy7dL7RkxnZOsD_gTR7fFYWymoAAlMAA8vpZhK_tiJ6DVcabyAE"),
  array("type" => "sticker", "id" => "003", "sticker_file_id" => "CAACAgIAAxkBAAOEYNy6RQw8l1HCLJeRSlUIu30VDPcAApoAAw9GzDpTtY2pwrIBSSAE"),
  array("type" => "sticker", "id" => "004", "sticker_file_id" => "CAACAgIAAxkBAAODYNy6OqlMm1-1Cr4CErVpjqNPPhEAAooAAw9GzDrUJ4nMSBFdlCAE"),
  array("type" => "sticker", "id" => "005", "sticker_file_id" => "CAACAgIAAxkBAAOCYNy6F8lhxhwBcL3BDJ1N-jAfktUAAt0GAALClqgYGps-rFt8wSogBA"),
  array("type" => "sticker", "id" => "006", "sticker_file_id" => "CAACAgIAAxkBAAOAYNy5-x2NW37BdlnAiDf1BPyCTyAAAsoGAALClqgY4auooFbcAAHNIAQ"),
  array("type" => "sticker", "id" => "007", "sticker_file_id" => "CAACAgIAAxkBAAN_YNy55PSCNJuZsMqRZ6CjYiwEkssAArUGAALClqgYGl4dDJpxfEkgBA"),
  array("type" => "sticker", "id" => "008", "sticker_file_id" => "CAACAgIAAxkBAAOHYNy-hJnp5k6ssDv6ogrpqzWex0YAAqwBAAIs1REXXR9mmMpNBYggBA"),
  array("type" => "sticker", "id" => "009", "sticker_file_id" => "CAACAgIAAxkBAAOIYNy-iDOvETJ4QlmC8AVFf1CJTjcAAq0BAAIs1REXF7Um5jNIVJUgBA"),
  array("type" => "sticker", "id" => "010", "sticker_file_id" => "CAACAgIAAxkBAAOJYNy-kigqyavcYbLs9MUzzOzKtHcAAq8BAAIs1REX6WTgHoGprJogBA"),
  array("type" => "sticker", "id" => "011", "sticker_file_id" => "CAACAgIAAxkBAAOKYNy-mHuDJsFE5Mrvs9MttbdJW7QAArABAAIs1REXmybfBqYS8U4gBA"),
  array("type" => "sticker", "id" => "012", "sticker_file_id" => "CAACAgIAAxkBAAOLYNy-mU28-plgVTeFq_ce2oicK_kAArEBAAIs1REXTi4XvIg7Yh0gBA"),
  array("type" => "sticker", "id" => "013", "sticker_file_id" => "CAACAgIAAxkBAAOMYNy-oL9GtZVx2fhWt0uFadzRe14AArMBAAIs1REX3zW_RJuJgj8gBA"),
  array("type" => "sticker", "id" => "014", "sticker_file_id" => "CAACAgIAAxkBAAONYNy-qLPaZNgsTjo8i0XgOm0LQCkAArQBAAIs1REXC-rfduhtpn4gBA"),
  array("type" => "sticker", "id" => "015", "sticker_file_id" => "CAACAgIAAxkBAAOOYNy-sCd-qMWYy8d2LUCqF6fuc4IAArgBAAIs1REXXjzS0zYUk08gBA"),
  array("type" => "sticker", "id" => "016", "sticker_file_id" => "CAACAgIAAxkBAAOPYNy-sXfq_UtHGVpOJnNZkVth-QEAArcBAAIs1REX4_HQeAb7PZIgBA")
);
define("ARREST_MESSAGES_FIRST", array(
    "это ваше первое правонарушение, поэтому вы отделаетесь предупреждением. Но имейте ввиду, что за повторное нарушение вы понесете наказание.",
    "на первый раз мы вас отпустим. Но только на первый.",
    "вы нарушили закон впервые. Мы не будем вас задерживать, но впредь будьте законопослушны.",
    "вы нарушили единственный закон этого чата, пункт 1 статьи 1: __Не игнорируй__. Так как вы сделали это впервые, мы вас отпустим. Не допускайте такого в будущем.",
    "игнорировать очень плохо, но в этом чате вы делаете это впервые. Так уж и быть, выпишем вам предупреждение. Будьте аккуратны и помните: *игнор вне закона*."
));
define("ARREST_MESSAGES_SECOND", array(
    "вот мы снова и встретились. Вы оштрафованы. Потерпевший обязан получить от вас макчикен в течение недели, или вы будете взяты под стражу",
    "вы нарушили закон во второй раз. Пройдемте с нами.",
    "а вот это уже серьезно. Второе правонарушение карается штрафом: выплатите потерпевшему компенсацию в виде макчикена.",
    "мы вас предупреждали. Садитесь в машину.",
    "опа, кого мы видим. Во второй раз простым предупреждением вы не отделаетесь. Ждите, мы выписываем протокол."
));
define("ARREST_MESSAGES_ANY", array(
    "с вами мы видимся чаще, чем с собственным начальством. Приговор простой: 15 суток сидения на бутылке, приступить немедленно.",
    "вы нам уже порядочно надоели. Если вы не прекратите нарушать, мы вас застрелим, и выставим все как несчастный случай.",
    "снова вы. Из-за вас у нас вся статистика испорчена. Меня лишили премии. Не стыдно? Уже %COUNT% раз нарушаете.",
    "%COUNT% нарушений. Вы завсегдатай нашего полицеского участка. Садитесь в машину.",
    "не слабо: %COUNT% вызов сделано по вашу душу. Число серьезное, не поспоришь. От лица полицеского департамента вручаем вам приз: %COUNT% ударов дубинкой, по разу за нарушение."
));
define("AMNESTY_MESSAGES", array(
    "сегодня ваш день. Один важный человек попросил нас сделать вид, что мы потеряли все записи о ваших правонарушениях.",
    "поступил приказ о вашей амнистии. Мы такого не одобряем, но приказ есть приказ."
));
define("TEASERS", array(
    //"%NAME%, совсем страх потеряли?",
    //"%NAME%, иди нахуй просто",
    "Ангус Макдональд приехал учиться из Шотландии в английский университет, где его поселили в одной комнате с еще двумя студентами. Когда он прожил там с месяц, к нему приехала мать, чтобы навестить его:
— Ну и как тебе эти английские студенты, Дональд?
Дональд ничего не ответил. Мать была простой женщиной, взяла и уебала его корытом по голове потому что нехуй игнорировать. Это, %NAME%, был тонкий намек.",
    "Ярослав Росса говорил, что если женщина молчит, значит Вы не входите в круг её интересов. Жаль, он не говорил, что если %NAME% молчит, то он охуел просто в край.",
    "Приходит ученик к мудрецу и спрашивает: в чем смысл жизни? Мудрец ничего не ответил. Потому что звали его %NAME% и был он не мудрецом а чмом последним.",
    "Лезет корова на дерево. За этим наблюдает ворона. Она спрашивает корову:
— Ты нахера на дерево лезешь?
Корова ничего не ответила. Звали корову %NAME% и она была не только дурой, но и бессовестной сволочью.",
    "Физик, инженер и математик принимают участие в эксперименте. Каждого запирают в комнате с банкой бобов. Через три дня исследователи по очереди открывают двери. В первой комнате они обнаруживают довольного физика, покрывающего пол и стены формулами. Консервная банка аккуратно открыта. На вопрос как он это сделал он отвечает:
— О, я просто приложил нагрузку к точкам напряжения.
В следующей комнате инженер, он сидит в углу, а рядом раскуроченая банка. На вопрос как открыл отвечает:
— Я наработал её до точки отказа.
Наконец, открывают третью дверь. Там на полу сидит математик, обнимает банку, качается взад-вперёд молчит.
'Почему ты молчишь?' — спросили математика.
'Я пидор' — ответил математик. Математика звали %NAME%.",
    "В своем доме, в гостиной, развалившись в кресле, сидит англичанин, курит трубку и читает утреннюю газету. Вдруг обваливается стена, и в гостиную, скрипя тормозами, въезжает Бентли, за рулем которого сидит другой англичанин. Первый спокойно переводит на него взгляд, вынимает трубку и спрашивает: 
- Могу я спросить, куда сэр так торопится?
Сэр ничего не ответил и англичанин застрелил его нахуй.",
    "Метро. На единственное свободное место садится классический, как их описывают в анекдоте, еврей. Нос. Очки. Взгляд печального спаниеля. Обращается к соседу:
— вы еврей?
Сосед был не еврей, а чмо по имени %NAME%, поэтому он ничего не ответил."
));
define("POLICE_EMOJIS", array("🚔", "🚓", "🚨", "👮", "🍩", "🔫", "🚧", "🛑", "🚥"));
define("TOKEN", "1874909612:AAGQQFTtJWedsAyBf1Q56aT16MKF8AwZMcQ");
define("USERNAME", "ignor_police_bot");
define("INFO_MESSAGE", "*Виу-виу*. Полиция игнора защитит вас от друзей, которые читают, но не отвечают.\nМеня можно добавить в группу, и вызвать командой /arrest. Сообщите, ответив на мое сообщение, ник злостного игнорщика, и он будет арестован.\nЕще я работаю в inline-режиме. Упомяните мой юзернейм в любом чате и получите потрясающий набор картинок на самые разные случаи игнора собеседника.\nОставайтесь в безопасности и помните: *игнор вне закона*.");
define("GROUP_MESSAGE", "*Мы уже здесь*. Полиция игнора отныне защищает всех участников этого чата от любителей читать и не отвечать.\nЧтобы вызвать нас, используйте команду /arrest. В ответ на наше сообщение укажите юзернейм игнорщика.");
define("ARREST_WHO_MESSAGE", "👮Кого арестовываем?");
define("STATS_WHO_MESSAGE", "👮Для кого предоставить статистику?");
define("AMNESTY_WHO_MESSAGE", "👮Кого следует простить?");

if (isset($json['message'])) {
  if ($json['message']['chat']['type'] == "private") {
    switch ($json['message']['text']) {
    case "/arrest":
      sendTelegram("sendMessage", array('chat_id' => $json['message']['chat']['id'], 'text' => "Никто не обязан свидетельствовать против себя, поэтому мы не можем совершить арест в личном чате. Вызовите нас в группу."));
      break;
    case "/amnesty":
      sendTelegram("sendMessage", array('chat_id' => $json['message']['chat']['id'], 'text' => "Тут некого прощать. Вызовите нас в группу."));
      break;
    case "/stats":
      sendTelegram("sendMessage", array('chat_id' => $json['message']['chat']['id'], 'text' => "Мы уполномочены предоставлять статистику только в группах."));
      break;
    case "/start":
      sendTelegram("sendMessage", array('chat_id' => $json['message']['chat']['id'], 'text' => (rand_element(POLICE_EMOJIS) . INFO_MESSAGE), 'parse_mode' => 'Markdown'));
      break;
    default:
      sendTelegram("sendMessage", array('chat_id' => $json['message']['chat']['id'], 'text' => (rand_element(POLICE_EMOJIS) . str_replace("%NAME%", $json['message']['text'], rand_element(TEASERS))), 'parse_mode' => 'Markdown'));
      break;
    }
  } else if ($json['message']['chat']['type'] == "group" || $json['message']['chat']['type'] == "supergroup") {
      if (isset($json['message']['reply_to_message'])) {
        if ($json['message']['reply_to_message']['text'] == ARREST_WHO_MESSAGE) {
          arrest($json['message']['chat']['id'], $json['message']['text']);
        } else if ($json['message']['reply_to_message']['text'] == AMNESTY_WHO_MESSAGE) {
          if ($json['message']['from']['username'] == str_replace('@', '', $json['message']['text'])) {
            sendTelegram("sendMessage", array('chat_id' => $json['message']['chat']['id'], 'text' => "Имейте совесть."));
          } else {
            amnesty($json['message']['chat']['id'], $json['message']['text']);
          }
        } else if ($json['message']['reply_to_message']['text'] == STATS_WHO_MESSAGE) {
          stats($json['message']['chat']['id'], $json['message']['text']);
        } else if ($json['message']['reply_to_message']['text'] == GROUP_MESSAGE) {
          sendTelegram("sendMessage", array('chat_id' => $json['message']['chat']['id'], 'text' => ASK_WHO_MESSAGE));
        }
      } else if ($json['message']['text'] == "/arrest" || $json['message']['text'] == "/arrest@ignor_police_bot") {
        sendTelegram("sendMessage", array('chat_id' => $json['message']['chat']['id'], 'text' => ARREST_WHO_MESSAGE));
      } else if ($json['message']['text'] == "/amnesty"  || $json['message']['text'] == "/amnesty@ignor_police_bot") {
        sendTelegram("sendMessage", array('chat_id' => $json['message']['chat']['id'], 'text' => AMNESTY_WHO_MESSAGE));
      } else if ($json['message']['text'] == "/stats" || $json['message']['text'] == "/stats@ignor_police_bot") {
        sendTelegram("sendMessage", array('chat_id' => $json['message']['chat']['id'], 'text' => STATS_WHO_MESSAGE));
      }
  }
} else if (isset($json['inline_query'])) {
  sendTelegram("answerInlineQuery", array("inline_query_id" => $json['inline_query']['id'], "results" => json_encode($INLINE_RESULTS)));
} else if (isset($json['my_chat_member'])) {
  if ($json['my_chat_member']['new_chat_member']['user']['username'] == USERNAME && $json['my_chat_member']['new_chat_member']['status'] == "member") {
    sendTelegram("sendMessage", array('chat_id' => $json['my_chat_member']['chat']['id'], 'text' => (rand_element(POLICE_EMOJIS) . GROUP_MESSAGE), 'parse_mode' => 'Markdown'));
  }
}

function get_violations($id, $who, $increment) {
  $violations = 0;
  $path = ("/var/www/api_core/ignorpolice/database/" . str_replace('@', '', $who) . "at" . (string)$id);
  if (file_exists($path)) {
    if ($increment == 0) {
     unlink($path);
     return true;
    }
    $violations = ((int)(file_get_contents($path)));
  } else if ($increment == 0) {
    return false;
  }
  if ($increment == 1) {
    $violations = $violations + 1;
    file_put_contents($path, (string)$violations);
  }
  return $violations;
}

function amnesty($id, $who) {
  $emoji = rand_element(POLICE_EMOJIS);
  $a = get_violations($id, $who, 0);
  if ($a == true) {
    $text = $emoji . $who . ", " . rand_element(AMNESTY_MESSAGES);
  } else {
    $text = $emoji . "Либо в бухгалтерии опять потеряли бумаги, либо " . $who . " не был замечен за нарушениями закона.";
  }
  sendTelegram("sendMessage", array('chat_id' => $id, 'text' => $text));
}

function stats($id, $who) {
  $violations = get_violations($id, $who, 2);
  $emoji = rand_element(POLICE_EMOJIS);
  $text = $emoji . "В нашей базе данных нашлось следующее количество записей о нарушениях " . $who . ": " . (string)$violations;
  sendTelegram("sendMessage", array('chat_id' => $id, 'text' => $text));
}

function arrest($id, $who) {
  $violations = get_violations($id, $who, 1);
  $text = "Звоните как до смерти доигнорят.";
  $emoji = rand_element(POLICE_EMOJIS);
  switch ($violations) {
  case 1:
    $text = rand_element(ARREST_MESSAGES_FIRST);
    break;
  case 2:
    $text = rand_element(ARREST_MESSAGES_SECOND);
    break;
  default:
    $text = rand_element(ARREST_MESSAGES_ANY);
    break;
  }
  $text = $emoji . $who . ', ' . str_replace("%COUNT%", (string)$violations, $text);
  sendTelegram("sendMessage", array('chat_id' => $id, 'text' => $text));
}

function rand_element($array) {
  return $array[array_rand($array)];
}

function sendTelegram($method, $response)
{
  $ch = curl_init("https://api.telegram.org/bot" . TOKEN . '/' . $method);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $response);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HEADER, false);
  $res = curl_exec($ch);
  curl_close($ch);
  return $res;
}
