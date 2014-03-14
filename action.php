<?php
session_start();

$alert = array(
	"type" 		=> "error",
	"content"	=> "Une erreur inconnue est survenue."
);

$directory = "messages";

if (isset($_POST["sendMessage"]))
{
	extract($_POST);
	$_SESSION["form"] = array(
		"name" => htmlspecialchars($name),
		"email" => htmlspecialchars($email),
		"subject" => htmlspecialchars($subject),
		"content" => htmlspecialchars($content)
	);
	if (isset($name) AND !empty($name))
	{
		if (isset($email) AND !empty($email))
		{
			if (filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				if (isset($subject) AND !empty($subject))
				{
					if (isset($content) AND !empty($content))
					{
						$time = time();
						$date = date("d/m/Y H:i:s", $time);
						$filename = $directory . "/" . $time . ".txt";

						if (!file_exists($directory))
						{
							if (!mkdir($directory))
							{
								$alert["type"] = "error";
								$alert["content"] = "Impossible d'enregistrer le message. Veuillez ré-essayer. (Erreur 01)";
							}
						}
						if (file_exists($directory))
						{
							$text = "Date d'envoi : " . $date . "\n";
							$text .= "Nom et prénom : " . htmlspecialchars($name) . "\n";
							$text .= "Email : " . htmlspecialchars($email) . "\n";
							$text .= "Sujet : " . htmlspecialchars($subject) . "\n";
							$text .= "Message : " . htmlspecialchars($content) . "\n";
							if (!file_put_contents($filename, $text))
							{
								$alert["type"] = "error";
								$alert["content"] = "Impossible d'enregistrer le message. Veuillez ré-essayer. (Erreur 02)";
							}
							else
							{
								$alert["type"] = "success";
								$alert["content"] = "Votre message a bien été enregistré. Je vous répondrais dès que possible.";
								unset($_SESSION["form"]);
							}
						}
					}
					else
					{
						$alert["type"] = "warning";
						$alert["content"] = "Veuillez entrer votre message.";
					}
				}
				else
				{
					$alert["type"] = "warning";
					$alert["content"] = "Veuillez renseigner un sujet.";
				}
			}
			else
			{
				$alert["type"] = "warning";
				$alert["content"] = "Veuillez renseigner une adresse e-mail correcte.";
			}
		}
		else
		{
			$alert["type"] = "warning";
			$alert["content"] = "Veuillez renseigner votre adresse e-mail.";
		}
	}
	else
	{
		$alert["type"] = "warning";
		$alert["content"] = "Veuillez renseigner votre nom et prénom.";
	}
}

$_SESSION["alert"] = $alert;

header("Location: index.php");
?>