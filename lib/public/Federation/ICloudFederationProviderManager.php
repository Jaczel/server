<?php
/**
 * @copyright Copyright (c) 2018 Bjoern Schiessle <bjoern@schiessle.org>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCP\Federation;

/**
 * Class ICloudFederationProviderManager
 *
 * Manage cloud federation providers
 *
 * @since 14.0.0
 *
 * @package OCP\Federation
 */
interface ICloudFederationProviderManager {

	/**
	 * Registers an callback function which must return an cloud federation provider
	 *
	 * @param string $shareType which share type does the provider handles
	 * @param string $displayName user facing name of the federated share provider
	 * @param callable $callback
	 * @throws Exceptions\ProviderAlreadyExistsException
	 *
	 * @since 14.0.0
	 */
	public function addCloudFederationProvider($shareType, $displayName, callable $callback);

	/**
	 * remove cloud federation provider
	 *
	 * @param string $shareType
	 *
	 * @since 14.0.0
	 */
	public function removeCloudFederationProvider($shareType);

	/**
	 * get a list of all cloudFederationProviders
	 *
	 * @return array [id => ['id' => $id, 'displayName' => $displayName, 'callback' => callback]]
	 *
	 * @since 14.0.0
	 */
	public function getAllCloudFederationProviders();

	/**
	 * get a specific cloud federation provider
	 *
	 * @param string $shareType
	 * @return ICloudFederationProvider
	 * @throws Exceptions\ProviderDoesNotExistsException;
	 *
	 * @since 14.0.0
	 */
	public function getCloudFederationProvider($shareType);

	/**
	 * send federated share
	 *
	 * @param ICloudFederationShare $share
	 * @return bool
	 *
	 * @since 14.0.0
	 */
	public function sendShare(ICloudFederationShare $share);

	/**
	 * send notification about existing share
	 *
	 * @param string $url
	 * @param ICloudFederationNotification $notification
	 * @return mixed
	 *
	 * @since 14.0.0
	 */
	public function sendNotification($url, ICloudFederationNotification $notification);

	/**
	 * check if the new cloud federation API is ready to be used
	 *
	 * @return bool
	 *
	 * @since 14.0.0
	 */
	public function isReady();


}