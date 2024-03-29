#!/bin/bash

source cli/template.sh

# Vérifie s'il y a au moins deux arguments
if [ $# -lt 2 ]; then
    echo "Utilisation : $0 <commande> <nom_du_fichier>"
    exit 1
fi

command=$1
className=$2

if [ "$command" = "make:controller" ]; then
   templateController "$className"
elif [ "$command" = "make:model" ]; then
    templateModel "$className"
elif [ "$command" = "make:form" ]; then
    templateForm "$className"
elif [ "$command" = "make:migration" ]; then
    migration "$className"
elif [ "$command" = "make:mail" ]; then
    templateMail "$className"
elif [ "$command" = "make:middleware" ]; then
    templateMiddleware "$className"
else
    echo "Commande non supportée : $command"
    exit 1
fi