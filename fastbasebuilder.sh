#Model table (tableau indicé, -A => associatif)
declare -a model_table
#Number of model
echo -e 'Bienvenue dans le programme de création de model/factory/controller/table\nCombien de model voulez-vous saisir?'
read number_model
#Check if variable is a greater than 0
while [ $number_model -lt 1 ]
do
    echo 'Vous devez choisir un nombre positif!'
done
echo "Vous allez créer $number_model model(s)"
#Saisie des models
for ((i=0; i<number_model; i++))
do
    echo "Saisir le model $i"
    read model
    model_table=(${model_table[@]} $model)
done
echo "Autres éléments à créer : "
read autres
for mod in ${model_table[@]}
do
    php artisan make:model $mod -$autres
done

echo "FIN!"