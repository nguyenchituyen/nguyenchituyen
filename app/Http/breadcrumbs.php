<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 22/03/2017
 * Time: 13:23
 */
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home Page', url('/'));
});

Breadcrumbs::register('user', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('user', route('user.index'));
});

Breadcrumbs::register('user.create', function ($breadcrumbs) {
    $breadcrumbs->parent('user');
    $breadcrumbs->push('Create New User', route('user.create'));
});

Breadcrumbs::register('user.show', function ($breadcrumbs, $id) {
    $user = App\User::find($id);
    $breadcrumbs->parent('user');
    $breadcrumbs->push($user->name, route('user.show', $user->id));
});

Breadcrumbs::register('user.edit', function ($breadcrumbs, $id) {
    $user = App\User::find($id);
    $breadcrumbs->parent('user');
    $breadcrumbs->push($user->name, route('user.edit', $user->id));
});

Breadcrumbs::register('job', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Job', route('job.index'));
});

Breadcrumbs::register('job.create', function ($breadcrumbs) {
    $breadcrumbs->parent('job');
    $breadcrumbs->push('Create New Job', route('job.create'));
});

Breadcrumbs::register('job.show', function ($breadcrumbs, $id) {
    $job = App\Job::find($id);
    $breadcrumbs->parent('job');
    $breadcrumbs->push($job->name, route('job.show', $job->id));
});

Breadcrumbs::register('job.edit', function ($breadcrumbs, $id) {
    $job = App\Job::find($id);
    $breadcrumbs->parent('job');
    $breadcrumbs->push($job->name, route('job.edit', $job->id));
});

Breadcrumbs::register('job.createTag', function ($breadcrumbs) {
    $breadcrumbs->parent('Tags');
    $breadcrumbs->push('Create New Tag', route('job.createTag'));
});

Breadcrumbs::register('Tags', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Tags Management', route('job.indexTag'));
});

Breadcrumbs::register('job.editTag', function ($breadcrumbs, $id) {
    $tag = App\Tags::find($id);
    $breadcrumbs->parent('Tags');
    $breadcrumbs->push($tag->name, route('job.editTag', $tag->id));
});

Breadcrumbs::register('role', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Role management', route('role.index'));
});

Breadcrumbs::register('role.create', function ($breadcrumbs) {
    $breadcrumbs->parent('role');
    $breadcrumbs->push('Create New Role', route('role.create'));
});

Breadcrumbs::register('role.edit', function ($breadcrumbs, $id) {
    $role = App\Role::find($id);
    $breadcrumbs->parent('role');
    $breadcrumbs->push($role->name, route('role.edit', $role->id));
});

Breadcrumbs::register('cultural', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Cultural Management', route('cultural.index'));
});

Breadcrumbs::register('cultural.create', function ($breadcrumbs) {
    $breadcrumbs->parent('cultural');
    $breadcrumbs->push('Create New Cultural', route('cultural.create'));
});

Breadcrumbs::register('cultural.edit', function ($breadcrumbs, $id) {
    $cultural = App\Cultural::find($id);
    $breadcrumbs->parent('cultural');
    $breadcrumbs->push($cultural->caption, route('cultural.edit', $cultural->id));
});

Breadcrumbs::register('cultural.show', function($breadcrumbs, $id) {
    $cultural = App\Cultural::find($id);
    $breadcrumbs->parent('cultural');
    $breadcrumbs->push($cultural->caption, route('cultural.show', $cultural->id));
});

Breadcrumbs::register('acl', function ($breadcrumbs) {
    $breadcrumbs->push('ACL management', route('acl.index'));
});

Breadcrumbs::register('acl.edit', function ($breadcrumbs, $username) {
    $breadcrumbs->parent('acl');
    $breadcrumbs->push($username, route('acl.edit', 1));
});

Breadcrumbs::register('resource', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('resource', route('resource.index'));
});

Breadcrumbs::register('resource.create', function ($breadcrumbs) {
    $breadcrumbs->parent('resource');
    $breadcrumbs->push('Create New Role Action', route('resource.create'));
});

Breadcrumbs::register('resource.edit', function ($breadcrumbs, $id) {
    $resource = App\RoleAction::find($id);
    $breadcrumbs->parent('resource');
    $breadcrumbs->push($resource->id, route('resource.edit', $resource->id));
});
Breadcrumbs::register('contact', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Contacts Management', route('contact.index'));
});
Breadcrumbs::register('contact.show', function($breadcrumbs, $id) {
    $contact = \App\Contact::find($id);
    $breadcrumbs->parent('contact');
    $breadcrumbs->push($contact->name , route('contact.show', $contact->id));
});

Breadcrumbs::register('job.jobsApply', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Jobs Apply', url('job/apply'));
});

Breadcrumbs::register('job.showJobApply', function ($breadcrumbs, $id) {
    $jobApply = App\JobsApply::find($id);
    $breadcrumbs->parent('job.jobsApply');
    $breadcrumbs->push($jobApply->name, route('user.show', $jobApply->id));
});