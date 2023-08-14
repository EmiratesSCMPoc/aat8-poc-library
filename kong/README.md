# Kong API Gateway as an Ingress Controller

Kong is installed via the official Helm Chart @ https://github.com/Kong/charts.

Please make sure you have helm installed and your kubectl context setup correctly.

Then add the Kong Helm Repository with:

```
helm repo add kong https://charts.konghq.com
helm repo update
```

## Install

If you are installing for the first time, please use the following:

```
kubectl apply -f namespace.yml
helm install kong kong/kong -f values.yml -n kong --version 2.6.3 --set ingressController.installCRDs=false
```

## Upgrade

To Upgrade Kong, please use the version flag for the version (meaning replace $version) you want with the command below:

```
helm upgrade kong kong/kong -f values.yml -n kong --version $version --set ingressController.installCRDs=false
```

## History of deployments

To see the deployment history for Kong, run:

```
helm history kong -n kong
```


## What is currently installed 

To see what version of the chart is currently running on the cluster, run:

```
helm list -n kong 
```

## What versions are available to install / upgrade to

To see what versions are available, run:

```
helm search repo kong/kong --versions
```

## Installing Custom Plugins for Kong Ingress

https://docs.konghq.com/kubernetes-ingress-controller/2.1.x/guides/setting-up-custom-plugins/


## Important Reading

* OIDC with Kong and OKTA - https://developer.okta.com/blog/2021/03/26/use-kong-gateway-to-centralize-authentication and
https://github.com/nokia/kong-oidc - but we do not use the OKTA login page so this will not work for us.
* Verifying Tokens with OKTA - https://github.com/portothree/kong-custom-auth
