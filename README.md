step : 

Build Image For Web PHP :
- eval $(minikube docker-env)
- docker build -t web-alumni:latest .

Create Configmap : 
kubectl create configmap db-init-sql   --from-file=db_alumni.sql=./db_alumni.sql   -n preprod

Apply Manifest : 
kubectl apply -k manifest/
