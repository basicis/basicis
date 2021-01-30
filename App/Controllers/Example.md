# App\Controllers\Example  

Example class

## Implements:
Basicis\Controller\ControllerInterface, Basicis\Http\Server\RequestHandlerInterface

## Extend:

Basicis\Controller\Controller

## Methods

| Name | Description |
|------|-------------|
|[createForm](#examplecreateform)|Function createForm
Create item form view|
|[deleteForm](#exampledeleteform)|Function deleteForm
Delete item form view|
|[getItemByName](#examplegetitembyname)|Function getItemByName
Get item by name|
|[setItem](#examplesetitem)|Function setItem
Set item form view|
|[updateForm](#exampleupdateform)|Function updateForm
Update item form view|

## Inherited methods

| Name | Description |
|------|-------------|
|__invoke|Function handle
Handles a request and produces a response.|
|all|Function all
Find all a model items of the specified class|
|create|Function create
Creates a model of the specified class|
|delete|Function delete
Delete a model of the specified class|
|extractUniqueColumns|Function extractUniqueColumns
Extract Unique Columns of model class and return these as array|
|find|Function find
Find one a model item of the specified class|
|getModelByAnnotation|Function getModelByAnnotation
Get annotations model class|
|handle|Function handle
Default method|
|index|Function index
Default method|
|update|Function update
Update a model of the specified class|



### Example::createForm  

**Description**

```php
public createForm (\App $app, object $args)
```

Function createForm
Create item form view 

 

**Parameters**

* `(\App) $app`
* `(object) $args`

**Return Values**

`\ResponseInterface`




<hr />


### Example::deleteForm  

**Description**

```php
public deleteForm (\App $app, object $args)
```

Function deleteForm
Delete item form view 

 

**Parameters**

* `(\App) $app`
* `(object) $args`

**Return Values**

`\ResponseInterface`




<hr />


### Example::getItemByName  

**Description**

```php
public getItemByName (\App $app, object $args)
```

Function getItemByName
Get item by name 

 

**Parameters**

* `(\App) $app`
* `(object) $args`

**Return Values**

`\ResponseInterface`




<hr />


### Example::setItem  

**Description**

```php
public setItem (\App $app, object $args)
```

Function setItem
Set item form view 

 

**Parameters**

* `(\App) $app`
* `(object) $args`

**Return Values**

`\ResponseInterface`




<hr />


### Example::updateForm  

**Description**

```php
public updateForm (\App $app, object $args)
```

Function updateForm
Update item form view 

 

**Parameters**

* `(\App) $app`
* `(object) $args`

**Return Values**

`\ResponseInterface`




<hr />

