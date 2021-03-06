<?php

return [
    'menu'                          => 'Contact',
    'model'                         => 'Contact',
    'models'                        => 'Contact',
    'edit'                          => 'Voir contacts',
    'tables'                        => [
        'phone'     => 'Téléphone',
        'email'     => 'Email',
        'full_name' => 'Nom complet',
        'time'      => 'Temps',
        'address'   => 'Adresse',
        'subject'   => 'Subject',
        'content'   => 'Content',
    ],
    'contact_information'           => 'Informations de contact',
    'replies'                       => 'réponses',
    'email'                         => [
        'header'  => 'Email',
        'title'   => 'Nouveau contact depuis votre site',
        'success' => 'Envoyer le message avec succès!',
        'failed'  => 'Impossible d\'envoyer un message à cette heure, veuillez réessayer plus tard!',
    ],
    'name.required'                 => 'Le nom est requis',
    'email.required'                => 'L\'email est requis',
    'email.email'                   => 'L\'adresse e-mail n\'est pas valide',
    'content.required'              => 'Le contenu est requis',
    'g-recaptcha-response.required' => 'Veuillez confirmer que vous n\'êtes pas un robot avant d\'envoyer le message.',
    'g-recaptcha-response.captcha'  => 'Vous n\'êtes pas encore confirmé robot.',
    'contact_sent_from'             => 'Ces informations de contact envoyées par',
    'sender'                        => 'Expéditeur',
    'sender_email'                  => 'Email',
    'sender_address'                => 'Adresse',
    'sender_phone'                  => 'Téléphone',
    'message_content'               => 'Contenu du message',
    'sent_from'                     => 'E-mail envoyé depuis',
    'form_name'                     => 'Nom',
    'form_email'                    => 'Email',
    'form_address'                  => 'Adresse',
    'form_subject'                  => 'Matière',
    'form_phone'                    => 'Téléphone',
    'form_message'                  => 'Message',
    'confirm_not_robot'             => 'Veuillez confirmer que vous n\'êtes pas un robot',
    'required_field'                => 'The field with (<span style="color: red">*</span>) is required.',
    'send_btn'                      => 'Envoyer le message',
    'new_msg_notice'                => 'Vous avez<span class="bold">:count</span> Nouveaux messages',
    'view_all'                      => 'Voir tout',
    'statuses'                      => [
        'read'   => 'Lis',
        'unread' => 'Non lu',
    ],
    'phone'                         => 'Téléphone',
    'address'                       => 'Adresse',
    'message'                       => 'Message',
    'settings'                      => [
        'email' => [
            'title'       => 'Contact',
            'description' => 'Configuration de la messagerie',
            'templates'   => [
                'notice_title'       => 'Envoyer un avis à l\'administrateur',
                'notice_description' => 'Modèle d\'e-mail pour envoyer un avis à l\'administrateur lorsque le système obtient un nouveau contact',
            ],
        ],
    ],
];
